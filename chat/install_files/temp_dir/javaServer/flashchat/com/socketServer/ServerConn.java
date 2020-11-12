/*
* Java socket server for FlashChat created by RuAnSoft (http://ruansoft.net), (c) 2006/07 TUFaT.com
*/
package flashchat.com.socketServer;

import java.net.Socket;
import java.io.IOException;
import java.io.BufferedWriter;
import java.io.OutputStreamWriter;

public class ServerConn extends Object implements ReadCallBack{
	protected SimpleServer server;
	protected Socket clientSock;
	protected ReadThread reader;
	protected BufferedWriter outStream;
	public ServerConn(SimpleServer server, Socket clientSock)
			throws IOException
	{
		
		this.server = server;
		this.clientSock = clientSock;
		outStream =  new BufferedWriter(new OutputStreamWriter(clientSock.getOutputStream(), "UTF8"));
		reader = new ReadThread(this, this.clientSock);
				
		reader.start();
	}

	public synchronized void dataReady(String str)
	{
		if (str == null)
		{
			disconnect();
			return;
		}
		String str1 = "";
		if (str.equals("<policy-file-request/>")) {
			String buf = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><cross-domain-policy><allow-access-from domain=\"*\" to-ports=\"*\" secure=\"false\" /></cross-domain-policy>\u0000";
			try
			{
				System.out.println(buf);
				outStream.write(buf);
				outStream.flush();
				disconnect();
			}
			catch (Exception e)
			{
				System.out.println("Exception "+e.getMessage());
			}
		}
		else {
			try
			{
				str1 = server.processString(str,outStream);				
				//outStream.flush();
			}
			catch( Exception writeError)
			{
				writeError.printStackTrace();
				disconnect();
				return;
			}
		}
	}
	public synchronized void disconnect()
	{
		try
		{
			reader.closeConnection();
		}
		catch( Exception cantclose)
		{
			reader.stop();
		}
	}
}
