function GetQueryString()
{
	return  window.location.search.substring(1);
}	

function QueryString(key)
{
	var value = null;
	for (var i=0;i<QueryString.keys.length;i++)
	{
		if (QueryString.keys[i]==key)
		{
			value = QueryString.values[i];
			break;
		}
	}
	return value;
}
QueryString.keys = new Array();
QueryString.values = new Array();

function QueryString_Parse()
{
	var query = window.location.search.substring(1);
	var pairs = query.split("&");
	
	for (var i=0;i<pairs.length;i++)
	{
		var pos = pairs[i].indexOf('=');
		if (pos >= 0)
		{
			var argname = pairs[i].substring(0,pos);
			var value = pairs[i].substring(pos+1);
			QueryString.keys[QueryString.keys.length] = argname;
			QueryString.values[QueryString.values.length] = value;		
		}
	}

}

function QueryString_Remove(qs_old, strRemove)
{
	if (qs_old == null)
		query = window.location.search.substring(1);
	else query = qs_old;
	
	var pairs = query.split("&");
	
	qs = "";
	
	for (var i=0;i<pairs.length;i++)
	{
		var pos = pairs[i].indexOf('=');
		if (pos >= 0)
		{
			var argname = pairs[i].substring(0,pos);
			if (argname != strRemove)
				qs = qs + "&" + pairs[i];
			
		}
	}
	
	return(qs);

}

QueryString_Parse();
  