/*
* Java socket server for FlashChat created by RuAnSoft (http://ruansoft.net), (c) 2006/07 TUFaT.com
*/
package flashchat.com.socketServer;

import java.net.Socket;
import java.io.DataInputStream;
import java.io.IOException;
import java.io.BufferedReader;


public class ReadThread extends Thread
{
	protected Socket connectionSocket;
	protected DataInputStream inStream;
	protected BufferedReader in;
	protected ReadCallBack readCallback;
	public ReadThread(ReadCallBack callback, Socket connSock) throws IOException
	{
		connectionSocket = connSock;
		readCallback = callback;
		inStream = new DataInputStream(connSock.getInputStream());
	}

	protected void closeConnection()//close connect
	{
		try
		{
			connectionSocket.close();
			stop();
		}
		catch( Exception oops)
		{
			stop();
		}
	}

	public void run()//run thread for clients
	{
		int intChar,num = -1;

		while(true)
		{
			try
			{
				String str = "";
				//str = inStream.readUTF();
				while( true )
				{

					intChar = inStream.read();
                    //System.out.println(intChar);
					//if socket disconnect
					if ( intChar == -1 )
					{
						if (num == -2)
							stop();
						num--;
						str ="<request id=\"\" cid=\"1\" c=\"lout\" b=\"2\" />";
						break;
					}
					//end if socket disconnect
					if ( intChar == 0 )
						break;

					str = str + String.valueOf((char)intChar);
				}
				
                readCallback.dataReady( str );
			}
			catch( Exception oops )
			{
				//System.out.println("Disconnect2");
                readCallback.dataReady( "<request id=\"\" cid=\"1\" c=\"lout\" b=\"2\" />" );
                readCallback.dataReady(null);
			}
		}
	}
}
