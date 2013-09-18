{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 14008 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if !$content_only}
    <div class="clear"></div>
</div>

<!-- Right -->
{*<div id="right_column" class="column">
{$HOOK_RIGHT_COLUMN}
</div>*}
</div>

<!-- Footer -->

</div>
<div id="footer" style="min-height: 340px;">
    <div class="wrapper">
        <div class="main-title">
            <a href="/riduzione-prezzi" style="margin-right: 50px;">{l s="promozioni"}</a>
            <a href="/news">{l s="news & eventi"}</a>
        </div>
        <div class="clear"></div>
        <div class="infos">
            <div class="logo-footer" style="background:url(/img/logo-new.png);width:170px;height: 153px;"></div>
            <div class="local">
                {*{l s="fattoria carpineto s.rl. societÃƒÂ  agricola"}<br />
                {l s="Via Venafrana,Km 4700 81050 Presenzano (CE) Tel/Fax: +39.0823.989080"}<br />
                {l s="P.IVA 03380370613"}*}
            </div>
            <div class="disclaimer">
                {*{l s="Tutte le foto che vedete sono autoprodotte in fattoria dal nostro personale specializzato.Se ne vieta ogni uso, riproduzione o divulgazione non autorizzato."}*}
            </div>
        </div>
        <div class="newsletter">
            {$HOOK_FOOTER}
        </div>
        <div class="social">
            <span class="title">{l s="seguici sui social"}</span>
            <span class="fanpage-link">
                <img src="/themes/carpineto/img/fb.png" />
            </span>
            <span class="fb-like">
                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.carpineto.it%2F&amp;send=false&amp;layout=box_count&amp;width=73&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90&amp;appId=391628004212090" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:73px; height:63px;" allowTransparency="true"></iframe>
            </span>
            <span class="fanpage-link">
                <img src="/themes/carpineto/img/gp.png" />
            </span>
            <span class="g-plus1" style="float:right;margin-right: 10px;">
                <div class="g-plusone" data-size="tall"></div>
                <script type="text/javascript">
      window.___gcfg = { lang: 'it' };

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                </script>
            </span>
        </div>
        <div class="clear"></div>
        <div class="wan">
            <div style="width:300px;margin-right: 40px;float:left;text-align: left;color:white;font-size:12px;">
                {l s="fattoria carpineto s.r.l. società agricola"}<br />
                {l s="Via Venafrana, Km 4700 81050 Presenzano (CE) Tel/Fax: +39.0823.989080"}<br />
                {l s="P.IVA 03380370613"}
            </div>
            <div style="width:300px;margin-right: 40px;float:left;text-align: left;color:white;font-size:12px;">
                {l s="Tutte le foto che vedete sono autoprodotte in fattoria dal nostro personale specializzato. Se ne vieta ogni uso, riproduzione o divulgazione non autorizzato."}
            </div>
            <div style="width:300px;float:left;font-size:12px;">
                <a class="white" href="http://www.mastcommunication.com/">credits</a>
            </div>
        </div>
    </div>
</div>
<!-- Place this tag after the last +1 button tag. -->
{/if}
</body>
</html>
