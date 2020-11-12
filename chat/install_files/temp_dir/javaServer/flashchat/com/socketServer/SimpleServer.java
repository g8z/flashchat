/*
* Java socket server for FlashChat created by RuAnSoft (http://ruansoft.net), (c) 2006/07 TUFaT.com
*/
package flashchat.com.socketServer;


import java.net.ServerSocket;
import java.net.Socket;
import java.net.URL;
import java.net.URLEncoder;
import java.io.*;
import java.util.Map;
import java.util.Hashtable;
import java.util.Enumeration;
import java.util.Date;
import java.text.SimpleDateFormat;

import flashchat.com.xml.XMLParser;
import flashchat.com.log.fileLog;


public class SimpleServer extends Object{
	protected ServerSocket listenSock;
	protected String flashchatPath;
	private fileLog toLog;
	private String errorReports;
	protected String toBox = "<request id=\"0\" cid=\"1\" c=\"tzset\" b=\"1\" tz=\"-180\" />";
	private XMLParser settingsXML = new XMLParser();
	private int userCount;
	private Hashtable AllClient = new Hashtable();
	public SimpleServer(String path)	throws IOException
	{
		flashchatPath = path;
		InputStream inUrl;
		int intChar;
        userCount = 0;
		String inStr = "";
		if( flashchatPath.indexOf("/") == flashchatPath.length()-1 )
			flashchatPath = flashchatPath.substring(0,flashchatPath.length()-2);
		try
		{
		URL setting = new URL(flashchatPath + "/temp/javaServer/settings.php");
		inUrl = setting.openStream();
		System.out.println(setting);
		}
		catch(IOException o)
		{
			inUrl = null;
			System.out.println("Incorrect HTTP path to FlashChat installed folder.");
			System.exit(1);
		}

		while( (intChar = inUrl.read())  != -1 )//
			inStr += inStr.valueOf((char)intChar);
		settingsXML.SetXML(inStr);
		String port = settingsXML.getAtr("port");
		String host = settingsXML.getAtr("host");
		errorReports = settingsXML.getAtr("errorReports");
		String max_client = settingsXML.getAtr("max_clients");
		String logFile = settingsXML.getAtr("log_file");
		//end imports settings
		toLog = new fileLog( logFile,true);
		try//start socket server
		{
			listenSock = new ServerSocket(Integer.parseInt(port),Integer.parseInt(max_client));
			listenSock.setSoTimeout(0);
		}
		catch( Exception oops)
		{
			toLog.log("Listening on host " + host + " port"+port+". Port used. Server could not started at ",errorReports);
			System.out.println("Listening on host " + host + ", port"+port+". Port used. Server could not start");
			toLog.close();
			//oops.printStackTrace();
			System.exit(1);
		}
		System.out.println("Listening on host " + host + " port " + port);
		toLog.log("Listening on host " + host + " port " + port  +". Server started at ","1");
		URL reset = new URL(flashchatPath + "/temp/javaServer/runServer.php?start=start");
		inUrl = reset.openStream();
	}


//wait new clients
	public void waitForClients()
	{
		while(true)
		{
			try
			{
				Socket newClient = listenSock.accept();
				ServerConn newConn = new ServerConn(this,newClient);
			}
			catch( Exception badAccept)
			{
				badAccept.printStackTrace();
			}
		}
	}
//end wait new clients

//read query from socket, put query to URL, get responce from URL, put responce to socket
	public synchronized String processString(String inStr,BufferedWriter stream)
	{
				
        XMLParser readXML = new XMLParser();
		if( inStr.equals("") )
			return "Error in inStr";
		readXML.SetXML(inStr);
		String in_buffer,id="",lg="";
        System.out.println("Read: " + inStr);
		boolean banu = false;
		boolean logoutByBt = true;
		boolean login = false,logout = false,identical=false;
		String c = "";
		
		
		if( !readXML.getName().equals("fileshare") && !readXML.getName().equals("load_photo"))
			c = readXML.getC();
		
		if ( c.equals("lin") || c.equals("tzset"))
		{
			login = true;

			if(!c.equals("tzset"))
			{
				lg = readXML.getAtr("lg");
				for (Enumeration e = this.AllClient.keys() ; e.hasMoreElements() ;)
				{
					String keys = (String)e.nextElement();					
					Hashtable tmp = (Hashtable)this.AllClient.get(keys);
					BufferedWriter temp = (BufferedWriter) tmp.get("stream");
					if ( readXML.getAtr("lg").equals((String) tmp.get("login")) )
					{
						id=readXML.getID();
						if( id.equals("") )
							return "Error";

						if (!id.equals("0"))
						{
							in_buffer = "<response id=\"" + id + "\" ><lout id=\""+readXML.getAtr("lg")+"\" t=\"7:07 pm\"><![CDATA[anotherlogin]]></lout></response>\u0000";
		   					try
							{
								stream.write(in_buffer);
								stream.flush();
								return in_buffer;
							}
							catch(IOException oo)
							{

							}
						}
						inStr = this.toBox;
						if( inStr.equals("") )
							return "Error";
						readXML.SetXML(inStr);
						identical = true;
						break;
					}
				}

			}
		}
        id = readXML.getID();


		if ( c.equals("banu") )
		{
			if( readXML.getAtr("b").equals("2") || readXML.getAtr("b").equals("3"))
			{
				logout = true;
				logoutByBt = true;
            	banu = true;
			}

		}
		if ( c.equals("lout") )
        {
			for (Enumeration e = this.AllClient.keys() ; e.hasMoreElements() ;)
			{
				String keys = (String)e.nextElement();
				if( keys.equals("") )
					return "Error";
				Hashtable tmp = (Hashtable)this.AllClient.get(keys);
				BufferedWriter temp = (BufferedWriter) tmp.get("stream");
				String log = (String) tmp.get("login");
				if ( temp == stream )
				{
					inStr = "<request id=\""+keys+"\" cid=\"1\" c=\"lout\" b=\"2\" />";
					id = keys;
					break;
				}


			}
			if ( readXML.getID().equals("") )
			    logoutByBt = false;


			logout = true;
		}
		try
		{
			inStr = URLEncoder.encode(inStr,"UTF-8");
		}
		catch ( UnsupportedEncodingException e )
		{
			e.printStackTrace();  //To change body of catch statement use File | Settings | File Templates.
		}
		String str_id = "";
		try
		{
			int random = ( int ) Math.random();
			//System.out.println("In url:" + inStr);
			URL homepage = new URL(flashchatPath + "/temp/javaServer/runServer.php?str="+inStr+"&r="+random);//put query to php
			in_buffer = "";
			BufferedReader wr = new BufferedReader(new InputStreamReader(homepage.openStream(), "UTF8"));
			XMLParser writeXML = new XMLParser();
			//System.out.println(flashchatPath + "/temp/javaServer/runServer.php?str="+inStr+"&r="+random);
		    //System.out.println(in_buffer);
			//System.out.println("after url");
			try
			{
                 boolean a = true;
				 while(a)//wr.ready()
				 {
					in_buffer = wr.readLine();
					
				    if(in_buffer==null)
					{
						a=false;
						break;
					}
				    
				    
				    if(in_buffer.length() < 4 || !in_buffer.substring(0,4).equals("<res"))
					{
				    	System.out.println("D: "+in_buffer);
                    	in_buffer = "";
                    	continue;
					}else {
						Integer end = (255 > in_buffer.length()) ? in_buffer.length() : 255;
						String tmp = in_buffer.substring(0, end);
						System.out.println(">>"+tmp);	
					}
				    
					


					writeXML.SetXML(in_buffer);
					str_id = writeXML.getID();
					
					System.out.println(str_id+"<<");
					if(str_id.equals(""))
						continue;

						if(login )
						{
							login = false;
							if( in_buffer.indexOf("><![CDATA[banned]]></lout>") != -1 )
							{
								SetAllClient(stream,str_id,"?","0");
								if( in_buffer.equals("") )
									return "Error";
								stream.write(in_buffer);
								stream.flush();
								break;
							}
							if( c.equals("lin"))//
							{
								SimpleDateFormat time = new SimpleDateFormat("HH:mm:ss ");
								Date date = new Date();


                                if(!identical)
                                {
									userCount++;
									System.out.println("User " + lg + " login to the chat at " + time.format(date));
                                    toLog.log("User " + lg + " login to the chat at ","1");
									System.out.println("Now " + userCount + " users in the chat");
                                }
                                
								SetAllClient(stream,str_id,lg,"1");
								
							}

							if(readXML.getC().equals("tzset"))
							{
								//System.out.println("New connections2");
								SetAllClient(stream,str_id,"?","0");
								if(identical)
									in_buffer = in_buffer.replaceAll("login","anotherlogin");
                                else
                                {
                                    System.out.println("New connections");
                                    toLog.log("New connections at ","1");
                                }
                                if( in_buffer.equals("") )
									return "Error";
								stream.write(in_buffer);
								stream.flush();
								break;
							}

						}
						for (Enumeration e = this.AllClient.keys() ; e.hasMoreElements() ;)//array of all clients
						{
							String keys = (String)e.nextElement();
							if( keys.equals("") )
								return "Error";
							Hashtable tmp = (Hashtable)this.AllClient.get(keys);
							BufferedWriter temp = (BufferedWriter) tmp.get("stream");
							String log = (String) tmp.get("login");
                            String send = (String) tmp.get("send");


							if( writeXML.getFirstChild().equals("banu") && banu )
							{
								id = str_id;
           						 banu = false;
								if(id.equals(""))
									return "Error";
							}

                            if( str_id.equals("") )
								return "Error";
							if ( keys.equals(str_id) && !log.equals("") && log != null && send.equals("1"))
							{
                                //System.out.println("URL1: " + in_buffer);
								temp.write(in_buffer);
								try
								{
									temp.flush();
								}
								catch(IOException flush)
								{
								}
                                if(writeXML.getFirstChild().equals("lout") && in_buffer.indexOf("><![CDATA[banned]]></lout>") != -1)
								{
					                SimpleDateFormat time = new SimpleDateFormat("HH:mm:ss ");
									Date date = new Date();
									   if(keys.equals(""))
										   	return "Error";
									Hashtable tmp1 = (Hashtable)this.AllClient.get(keys);
									String userLogin = (String) tmp1.get("login");
                       					tmp1.put("login","");
									tmp1.put("send","0");
									this.AllClient.put(keys,tmp1);
									userCount--;
									URL forSess = new URL(flashchatPath + "/temp/javaServer/runServer.php?deleteID="+keys);
									toLog.log("User " + userLogin + " logout from the chat at ","1");
									System.out.println("User " + userLogin + " logout from the chat at " + time.format(date));
									InputStream del = forSess.openStream();
									logout = false;
									//System.gc();
								}

								if( writeXML.getFirstChild().equals("fileshare") || writeXML.getFirstChild().equals("load_photo"))
								{
									stream.close();
									return in_buffer;
								}
							}
						}
				 }

				if (logout)//logout clients
				{
					SimpleDateFormat time = new SimpleDateFormat("HH:mm:ss ");
					Date date = new Date();

                    if( id.equals("") )
							return "Error";

					if ( !logoutByBt )
					{
						//System.out.println("all delete" + id);
						Hashtable tmp = (Hashtable)this.AllClient.get(id);
						String userLogin = (String) tmp.get("login");
                        userCount--;
						this.AllClient.remove(id);
						URL forSess = new URL(flashchatPath + "/temp/javaServer/runServer.php?delete="+id);
						if( !userLogin.equals("") )
						{
							toLog.log("User " + userLogin + " logout ,connection closed at ","1");
							System.out.println("User " + userLogin + " logout ,connection closed at "+time.format(date));
						    System.out.println("Now " + userCount + " users in the chat");
						}
						InputStream del = forSess.openStream();
						logout = false;
						System.gc();
					}
					else
					{
						//System.out.println("not all delete" + id);
						Hashtable tmp = (Hashtable)this.AllClient.get(id);
						String userLogin = (String) tmp.get("login");
                        tmp.put("login","");
						tmp.put("send","0");
                        userCount--;
						this.AllClient.put(id,tmp);
						URL forSess = new URL(flashchatPath + "/temp/javaServer/runServer.php?deleteID="+id);
						if( !userLogin.equals("") )
						{
							toLog.log("User " + userLogin + " logout from the chat at ","1");
							System.out.println("User " + userLogin + " logout from the chat at "+ time.format(date));
						    System.out.println("Now " + userCount + " users in the chat");
						}
						InputStream del = forSess.openStream();
						logout = false;
						//System.gc();
					}


				}
			}
			catch(IOException e)
			{
				toLog.log("Error read openStream at ",errorReports);
				System.out.println("Error read openStream ");
			}
			wr.close();
		}
		catch(IOException e)
		{
			toLog.log("Error URL at ",errorReports);
			System.out.println("Error URL ");
			in_buffer = "error";
		}
		return in_buffer;
	}
	public static void main(String args[]) throws IOException//main function
	{
		try
		{
			SimpleServer server = new SimpleServer(args[0]);
			
			server.waitForClients();
		}
		catch(Exception exit)
		{
			System.out.println( "Incorrect HTTP path to FlashChat installed folder." );
			System.exit(1);
		}

	}

	public Map getAllClient()
	{
		return this.AllClient;
	}
	public void  SetAllClient(BufferedWriter client,String id,String login,String send)//set array of all clients
	{
		Hashtable temp = new Hashtable();
		temp.put(new String("stream"),client);
		temp.put(new String("login"),login);
		temp.put(new String("send"),send);
		this.AllClient.put(id,temp);
	}
}
