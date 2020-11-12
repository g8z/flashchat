/*
* Java socket server for FlashChat created by RuAnSoft (http://ruansoft.net), (c) 2006/07 TUFaT.com
*/
package flashchat.com.log;

import java.io.FileWriter;
import java.io.PrintWriter;

import java.util.Date;
import java.text.SimpleDateFormat;


public class fileLog {
	private boolean detail = false;
	private PrintWriter pw = null;

	public fileLog(String fname,boolean details){

		detail = details;
		try
		{
			pw = new PrintWriter(new FileWriter(fname,true));
		}
		catch (Exception e)
		{
			System.out.println("Cant save log file: " + fname );
		}
	}

	public void log(String message,String isDetail)
	{
		if ( !isDetail.equals("1") )
			return;

		SimpleDateFormat bartDateFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss ");
		SimpleDateFormat time = new SimpleDateFormat("HH:mm:ss ");
		Date date = new Date();
		pw.println( bartDateFormat.format(date)+"\t" + message + " " + time.format(date) );
		pw.flush();
	}

	public void close()
	{
		pw.close();
	}
}
