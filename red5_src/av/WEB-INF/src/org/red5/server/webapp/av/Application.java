package org.red5.server.webapp.av;

import org.apache.commons.lang.math.RandomUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

import org.red5.server.adapter.ApplicationAdapter;
import org.red5.server.api.IConnection;
import org.red5.server.api.IScope;
import org.red5.server.api.IClient;

import org.red5.server.api.so.ISharedObject;
import org.red5.server.api.stream.IStreamCapableConnection;
import org.red5.server.api.stream.support.SimpleBandwidthConfigure;
import org.red5.server.api.Red5;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;


public class Application extends ApplicationAdapter {
	private static final Log log = LogFactory.getLog(Application.class);
	private String uId = "nope";
	private int _gId  = 1;
	ISharedObject so;

	@Override
	public boolean appStart(IScope app) {
		createSharedObject(app, "users_so", true);
		
		so = getSharedObject(app, "users_so");
		so.clear();
		//so.setAttribute("users_so", new Object[]{} );

		log.info("MultiAVM started");
		return super.appStart(app);
	}
	
	@Override
	public boolean appConnect(IConnection conn, Object[] params) {
		
		int _globalUserId = _gId++;
		
		conn.getClient().setAttribute("id", _globalUserId);
		
//		uId = conn.getClient().getId();
		uId = "u" +_globalUserId;
		Map<String,Object> newUser = new HashMap<String,Object>();
		newUser.put("name", (String)params[0]);
		
		newUser.put("uid", uId);
		newUser.put("graphics", null);
		newUser.put("shareRequest", null);
		newUser.put("shareResponses", null);
		newUser.put("settings", null);
		newUser.put("isSend", false);
		newUser.put("connectedTo", null);
		so.setAttribute(uId, newUser);
		
//		log.info("Client connected " + uId + " conn " + conn);
//		log.info("Setting stream id: "+ getClients().size()); // just a unique number
		return true;
	}
	
	
	@Override
	public void appDisconnect(IConnection conn) {
		so.clear();
		/*ArrayList _users = (ArrayList)so.getAttribute("users_so");
		int _clientId = ((Integer)conn.getClient().getAttribute("id")).intValue();
		
		_users.set(_clientId, null);
		
		log.info("Client disconnected: " + _clientId);
		
		so.setAttribute("users", _users );*/

		super.appDisconnect(conn);
	}
	
	public String getId() 
	{
		return uId;
	}
	
	public void setBandwidth(int _bw) 
	{
		IConnection conn = Red5.getConnectionLocal();

		//org.red5.server.api.IFlowControllable.setBandwidthConfigure
		IClient _client = conn.getClient();
		
		//IStreamCapableConnection streamConn = (IStreamCapableConnection) conn;
		SimpleBandwidthConfigure config = new SimpleBandwidthConfigure();	
		
		// set the bandwidth for the client
		/*if ( _bw == 1 ) {
			// modem settings
			config.setMaxBurst((int)(200000/8));
			config.setBurst((int)(200000/8));
			config.setOverallBandwidth((int)(56000/8));
			_client.setBandwidthConfigure(config);		
			//this.setBandwidthLimit( 35000/8, 22000/8 );
		} else if ( _bw == 2 ) {
			// DSL settings
			config.setMaxBurst((int)(500000/8));
			config.setBurst((int)(500000/8));
			config.setOverallBandwidth((int)(115000/8));
			_client.setBandwidthConfigure(config);		
			
			//this.setBandwidthLimit( 800000/8, 100000/8 );//
		} else 
		//if ( bw == 3 ) 
		{
			// LAN settings
			config.setMaxBurst((int)(1000000/8));
			config.setBurst((int)(1000000/8));
			config.setOverallBandwidth((int)(1000000/8));
			_client.setBandwidthConfigure(config);		
			//this.setBandwidthLimit( 400000, 400000 );
		}*/
	}	
    
}
