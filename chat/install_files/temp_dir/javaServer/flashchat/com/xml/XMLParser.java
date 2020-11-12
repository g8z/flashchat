/*
* Java socket server for FlashChat created by RuAnSoft (http://ruansoft.net), (c) 2006/07 TUFaT.com
*/
package flashchat.com.xml;

import java.util.*;
import net.n3.nanoxml.*;

public class XMLParser{
	private String xml = null;
	private String origXML = null;
	private boolean debugmode = false;
	IXMLElement myXml;
	private Map foundElements = new HashMap();

	public XMLParser ()
	{

	}

	public void SetXML (String XML)
	{
		xml = XML;
		try
		{
			IXMLParser parser = XMLParserFactory.createDefaultXMLParser();
			IXMLReader reader = StdXMLReader.stringReader(xml);
			parser.setReader(reader);
			myXml = (IXMLElement) parser.parse();
		}
		catch(Exception e)
		{
			e.printStackTrace();
			System.out.println("Unhandled XML exception while parsing:\n"+xml);
		}
	}
	public String getName()
	{
		String value = (String)myXml.getName();
		return value;
	}
	public String getID()
	{
		String value = (String)myXml.getAttribute("id");
		return value;
	}
	public String getAtr(String a)
	{
		String value = (String)myXml.getAttribute(a);
		return value;
	}

	public String getC()
	{
		String value = (String)myXml.getAttribute("c");
		return value;
	}
	public Map getAllXMLElements()
	{
		return foundElements;
	}
	public String getFirstChild()
	{
		String name = "";
		if ( myXml.hasChildren() )
		{
			IXMLElement child = myXml.getChildAtIndex(0);
			name = child.getName();
		}
		return name;
	}
}
