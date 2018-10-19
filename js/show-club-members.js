
//showClubMembers
function showClubMembers(json){
    var statusHTML = [];
    for (var i=0; i<json.length; i++) {
        var p = json[i];

        for (var j=0; j<p.length; j++) {
            // statusHTML.push('<div class="col-sm-6" style="min-height:30px;">');
            // statusHTML.push('<table>');
            // statusHTML.push('<tr>');
            // statusHTML.push('<td style="min-width:50px;padding-right:5px;" valign="top">');
            // statusHTML.push('</td>');
            // statusHTML.push('<td valign="top">');
            statusHTML.push('<div class="members__info">');

            statusHTML.push('<h4 class="members__name">' + p[j].USERNAME + '</h4>');

            // statusHTML.push('<a href="http://ismyrotaryclub.org/R_Emailer.cfm?UserID='+p[j].USERID+'" class="various" data-fancybox-type="iframe"><b>'+p[j].USERNAME+'</b></a>');
                        
            if ( p[j].BUSNAME != '' ) {
                if ( p[j].BUSWEB != '' ) {
                    var newURL = p[j].BUSWEB;

                    if (!newURL.match(/^[a-zA-Z]+:\/\//)) {
                        newURL = 'http://' + newURL;
                    }

                    statusHTML.push('<p class="members__text"><a href="' + newURL + '" target="_new">' + p[j].BUSNAME + '</a></p>');

                    // statusHTML.push('<br><a href="'+newURL+'" target="_new">'+p[j].BUSNAME+'</a>');

                } else {
                    statusHTML.push('<p class="members__text">' + p[j].BUSNAME + '</p>');
                }
            }
                            
            if ( p[j].CLASSIFICATION != '' ) {
                // statusHTML.push('<br>'+p[j].CLASSIFICATION+'');
                statusHTML.push('<p class="members__text">' + p[j].CLASSIFICATION + '</p>');
            }
        
            if ( p[j].CLUBID == '65535' ) {         // Mark's eClub
                if ( p[j].CITY != '' ) {
                    statusHTML.push('<p class="members__text">'+p[j].CITY+', ');

                    if ( p[j].STATECODE != '' ) {
                        statusHTML.push(p[j].STATECODE+'&nbsp;&nbsp;');
                    }
                    if ( p[j].COUNTRYCODE != '' ) {
                        statusHTML.push(p[j].COUNTRYCODE);
                    }
                    
                    statusHTML.push('</p>');
                }
            }

            statusHTML.push('<a href="http://ismyrotaryclub.org/R_Emailer.cfm?UserID=' + p[j].USERID + '" class="members__email" data-fancybox-type="iframe"><i class="fas fa-envelope"></i> Email ' + p[j].USERNAME + '</a>');

            // statusHTML.push('</td>');
            // statusHTML.push('</tr>');
            // statusHTML.push('</table>');
            statusHTML.push('</div>');
        }
    }

    if ($("#showclubmemberspage").length) {
     document.getElementById('showclubmemberspage').innerHTML = statusHTML.join('');
    }
}