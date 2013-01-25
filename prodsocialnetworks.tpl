<!-- Block Social Product Module -->
<!--
/*
 * Module ......: prodsocialnetworks
 * File ........: prodsocialnetworks.tpl
 * Description .: Simple Prestashop Module to able Social Networks on Producst Page
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */
-->
<p id="socialproduct" class="align_left">
	{if $twitterEnabled and $twitterEnabled == 'true'}
		<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="LeFayLingeries">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>        
    {/if}
	{if $facebookEnabled and $facebookEnabled == 'true'}
		<br/>
		<iframe src="http://www.facebook.com/plugins/like.php?href=http://{$smarty.server.SERVER_NAME|escape}{$smarty.server.REQUEST_URI|escape} &amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>        
    {/if}
	{if $orkutEnabled and $orkutEnabled == 'true'}
		<br/>
        <a href="http://promote.orkut.com/preview?nt=orkut.com&tt=Curti+um+produto+em LeFay.com.br&du=http://{$smarty.server.SERVER_NAME|escape}{$smarty.server.REQUEST_URI|escape}" target="_blank"><img src="http://www.gstatic.com/orkut/api/pt_BR_orkut_regular-001.gif" border="0"/></a>
    {/if}
</p>
<br class="clear" />
<!-- /Block Social Product Module -->
