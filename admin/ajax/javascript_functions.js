/* javascript_functions.js - for ajaxCRUD version 6.x */
/* you should NOT need to ever edit this file */

var loading_image_html; //set via setLoadingImageHTML()
var filterReq = "";	// used in filtering the table
var pageReq = "";	// used in pagination
var sortReq = ""; 	// used for sorting the table
var this_page;		// the php file loading ajaxCRUD (including all params)

/* Ajax functions */
function createRequestObject() {
     var http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType('text/xml');
            //http_request.overrideMimeType('text/html');
            http_request.overrideMimeType('text/plain;charset=ISO-8859-1');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }

      return http_request;
}

var http = createRequestObject();
var add_http = createRequestObject();
var filter_http = createRequestObject();
var sort_http = createRequestObject();
var other_http = createRequestObject();

//used for updating
function sndUpdateReq(action) {
    http.open('get', action);
    http.onreadystatechange = handleUpdateResponse;
    http.send(null);
}

/*
unused (for now)
function sndPostReq(url, parameters) {
    http.open('POST', url);
	http.onreadystatechange = handleUpdateResponse;
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", parameters.length);
	http.setRequestHeader("Connection", "close");
    http.send(parameters);
}
*/


//for handling all ajax editing
//TODO: make function name less generic
function handleUpdateResponse() {
    if(http.readyState == 4){

        var return_string = http.responseText;

        //if there's an error in the update
        if (return_string.substring(0,5) == 'error'){
            var broken_string = return_string.split("|");
            var id = 'Fields'.broken_string[1];
            var old_value = broken_string[2];

            //only enter an alert if you want to. we removed because so many people complained
            //window.alert('No changes made to cell.');

            //display the display section, fill it with prior content
            document.getElementById(id+'_show').innerHTML = old_value;
            document.getElementById(id+'_show').style.display = '';
            //hide editing and saving sections
            document.getElementById(id+'_edit').style.display = 'none';
            document.getElementById(id+'_save').style.display = 'none';
        }

        else{
            var broken_string = return_string.split("|");
            var id = broken_string[0];
            var replaceText = myStripSlashes(broken_string[1]);

			//display the display section, fill it with new content
			if (replaceText != "{selectbox}"){
				if (replaceText != null){
					document.getElementById(id+'_show').innerHTML = replaceText;
				}
				else{
					document.getElementById(id+'_show').innerHTML = "";
				}
			}
			else{
				var the_selectbox = document.getElementById(id);
				document.getElementById(id+'_show').innerHTML = the_selectbox.options[the_selectbox.selectedIndex].text;
			}
            document.getElementById(id+'_show').style.display = '';
            //hide editing and saving sections
            document.getElementById(id+'_edit').style.display = 'none';
            document.getElementById(id+'_save').style.display = 'none';
        }
    }
}



function myStripSlashes(str) {
    str=str.replace(/\\'/g,'\'');
    str=str.replace(/\\"/g,'"');
    return str;
}

