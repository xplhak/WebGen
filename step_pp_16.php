<?php

/*
    Copyright (c) 2009 Jaromír Plhák

    Permission is hereby granted, free of charge, to any person
    obtaining a copy of this software and associated documentation
    files (the "Software"), to deal in the Software without
    restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following
    conditions:
    
    The above copyright notice and this permission notice shall be
    included in all copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
    OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
    NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
    HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
    WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
    OTHER DEALINGS IN THE SOFTWARE.
*/
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_links_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_16'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_16']["$key"] = changeVar($value);
        }
    }
    
    $nextInput = array('links_def', 'links_undef');
    
    $isAllFalse = true;
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"])) {
            $isAllFalse = false;
        }
    }
    
    echo "<h1>".$webgen_links_title[$language]."</h1>";  

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul class="clear">   
    <?php

        if (isset($_SESSION['step_pp_5']['links_def'])  || $isAllFalse) {
    
    ?>
        <li id=li_organisations>
            <label>
                <input type="checkbox" value="yes" name="links_organisations" <?php if (isset($_SESSION['step_pp_16']['links_organisations'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'organisations'"; ?>)" />
                <?php echo $webgen_links_organisations[$language] ?> <span id="links_organisations_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_organisations'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="organisations_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_organisations'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_organisations_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_organisations_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_organisations_sons[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_organisations_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_organisations_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_organisations_brailnet[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_organisations_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_organisations_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_organisations_tyflo[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_organisations_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_organisations_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_organisations_teir[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_organisations_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_organisations_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_organisations_nrozp[$language]; ?>
                    </label>
                </li>                           
            </ul>            
        </li>
        
        <li id=li_social>
            <label>
                <input type="checkbox" value="yes" name="links_social"  <?php if (isset($_SESSION['step_pp_16']['links_social'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'social'"; ?>)" />
                <?php echo $webgen_links_social[$language] ?> <span id="links_social_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_social'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="social_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_social'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_lide[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_spoluzaci[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_libimseti[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_facebook[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_myspace[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_social_pom6" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_social_pom6'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_social_lastfm[$language]; ?>
                    </label>
                </li>                                            
            </ul>    
        </li>

        <li id=li_chat>
            <label>
                <input type="checkbox" value="yes" name="links_chat"  <?php if (isset($_SESSION['step_pp_16']['links_chat'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'chat'"; ?>)" />
                <?php echo $webgen_links_chat[$language] ?> <span id="links_chat_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_chat'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="chat_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_chat'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_chat_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_chat_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_chat_xchat[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_chat_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_chat_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_chat_forever[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>

        <li id=li_browser>
            <label>
                <input type="checkbox" value="yes" name="links_browser"  <?php if (isset($_SESSION['step_pp_16']['links_browser'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'browser'"; ?>)" />
                <?php echo $webgen_links_browser[$language] ?> <span id="links_browser_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_browser'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="browser_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_browser'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_expl[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_opera[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_firefox[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_safari[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_chrome[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom6" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom6'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_lynx[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_browser_pom7" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_browser_pom7'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_browser_konqueror[$language]; ?>
                    </label>
                </li>                
            </ul>
        </li>

        <li id=li_news>
            <label>
                <input type="checkbox" value="yes" name="links_news"  <?php if (isset($_SESSION['step_pp_16']['links_news'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'news'"; ?>)" />
                <?php echo $webgen_links_news[$language] ?> <span id="links_news_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_news'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="news_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_news'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_ihned[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_idnes[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_lidovky[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_aktualne[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_tncz[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom6" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom6'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_novinky[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_news_pom7" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_news_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_news_blesk[$language]; ?>
                    </label>
                </li>                 
            </ul>
        </li>
        
         <li id=li_search>
            <label>
                <input type="checkbox" value="yes" name="links_search"  <?php if (isset($_SESSION['step_pp_16']['links_search'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'search'"; ?>)" />
                <?php echo $webgen_links_search[$language] ?> <span id="links_search_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_search'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="search_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_search'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_google[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_cuil[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_msn[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_wikia[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_yahoo[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom6" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom6'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_seznam[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom7" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom7'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_centrum[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom8" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom8'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_atlas[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_search_pom9" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_search_pom9'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_search_idos[$language]; ?>
                    </label>
                </li>  
            </ul>
        </li>

        <li id=li_dictionary>
            <label>
                <input type="checkbox" value="yes" name="links_dictionary"  <?php if (isset($_SESSION['step_pp_16']['links_dictionary'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'dictionary'"; ?>)" />
                <?php echo $webgen_links_dictionary[$language] ?> <span id="links_dictionary_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_dictionary'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="dictionary_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_dictionary'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_dictionary_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_dictionary_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_dictionary_slovnik[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_dictionary_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_dictionary_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_dictionary_sezslovnik[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_dictionary_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_dictionary_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_dictionary_cizichslov[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_dictionary_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_dictionary_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_dictionary_merr[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>            
                  
        <li id=li_maps>
            <label>
                <input type="checkbox" value="yes" name="links_maps"  <?php if (isset($_SESSION['step_pp_16']['links_maps'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'maps'"; ?>)" />
                <?php echo $webgen_links_maps[$language] ?> <span id="links_maps_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_maps'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="maps_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_maps'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_maps_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_maps_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_maps_mapy[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_maps_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_maps_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_maps_amapy[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_maps_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_maps_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_maps_earth[$language]; ?>
                    </label>
                </li>
            </ul>
        </li> 
        
        <li id=li_client>
            <label>
                <input type="checkbox" value="yes" name="links_client"  <?php if (isset($_SESSION['step_pp_16']['links_client'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'client'"; ?>)" />
                <?php echo $webgen_links_client[$language] ?> <span id="links_client_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_client'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="client_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_client'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_client_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_client_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_client_icq[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_client_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_client_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_client_miranda[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_client_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_client_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_client_qip[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_client_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_client_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_client_skype[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_client_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_client_pom5'])) { echo "checked=\"checked\""; } ?> />
                         <?php echo $webgen_links_client_jabber[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>            
        
        <li id=li_gallery>
            <label>
                <input type="checkbox" value="yes" name="links_gallery"  <?php if (isset($_SESSION['step_pp_16']['links_gallery'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'gallery'"; ?>)" />
                <?php echo $webgen_links_gallery[$language] ?> <span id="links_gallery_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_gallery'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="gallery_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_gallery'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_gallery_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_gallery_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_gallery_flickr[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_gallery_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_gallery_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_gallery_picasa[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_gallery_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_gallery_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_gallery_rajce[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_gallery_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_gallery_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_gallery_mojefoto[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_gallery_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_gallery_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_gallery_fotomat[$language]; ?>
                    </label>
                </li> 
            </ul>
        </li>  
        
        <li id=li_game>
            <label>
                <input type="checkbox" value="yes" name="links_game"  <?php if (isset($_SESSION['step_pp_16']['links_game'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'game'"; ?>)" />
                <?php echo $webgen_links_game[$language] ?> <span id="links_game_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_game'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="game_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_game'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_travian[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_darkorbit[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom3" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom3'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_ikariam[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom4" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom4'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_bittefight[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom5" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom5'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_darkelf[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_game_pom6" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_game_pom6'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_game_stargate[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>
        
        <li id=li_other>
            <label>
                <input type="checkbox" value="yes" name="links_other"  <?php if (isset($_SESSION['step_pp_16']['links_other'])) { echo "checked=\"checked\""; } ?> onclick="pack_links(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'other'"; ?>)" />
                <?php echo $webgen_links_other[$language] ?> <span id="links_other_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_16']['links_other'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="other_list" class="clear" <?php if (!isset($_SESSION['step_pp_16']['links_other'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_other_pom1" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_other_pom1'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_other_wikipedia[$language]; ?>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="links_other_pom2" value="yes" <?php if (isset($_SESSION['step_pp_16']['links_other_pom2'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_links_other_youtube[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>                
    <?php
        
        }
        if (isset($_SESSION['step_pp_5']['links_undef']) || $isAllFalse) {
    
    ?>                    
        <li id="li_links">
            <ul class="ul_links">
                <li class="links_url">
                    <label>
                        <span class="span_links_desc"></span> <span class="links_label"><?php echo $webgen_links_undef[$language]; ?></span>
                        <input type="text" name="link_description_data[]"
                            onkeyup="links_info(this, 'span_submit_button', '<?php echo $webgen_links_undef_description[$language]; ?>', '<?php echo $webgen_links_undef_empty[$language]; ?>', '<?php echo $webgen_links_undef_emptyfirst[$language]; ?>', '<?php echo $webgen_links_undef_description_valid[$language]; ?>', '<?php echo $webgen_links_undef_description_invalid[$language]; ?>', '<?php echo $webgen_links_undef_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'description')"
                            onclick="links_info(this, 'span_submit_button', '<?php echo $webgen_links_undef_description[$language]; ?>', '<?php echo $webgen_links_undef_empty[$language]; ?>', '<?php echo $webgen_links_undef_emptyfirst[$language]; ?>', '<?php echo $webgen_links_undef_description_valid[$language]; ?>', '<?php echo $webgen_links_undef_description_invalid[$language]; ?>', '<?php echo $webgen_links_undef_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'description')" />
                    </label>
                </li>
                
                <li class="links_invisible" style="display: none;" >
                    <label>
                        <span class="span_links_url"></span> <?php echo $webgen_links_undef_url[$language]; ?>
                        <input type="text" name="link_url_data[]"
                            onkeyup="prompt_clone_check(this, '.span_links_desc', '<?php echo $webgen_links_undef_url_empty[$language]; ?>', '<?php echo $webgen_links_undef_url_valid[$language]; ?>', '<?php echo $webgen_links_undef_url_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'url', 'ul')"
                            onclick="prompt_clone_check(this, '.span_links_desc', '<?php echo $webgen_links_undef_url_empty[$language]; ?>', '<?php echo $webgen_links_undef_url_valid[$language]; ?>', '<?php echo $webgen_links_undef_url_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'url', 'ul')" />
                    </label>
                </li>
            </ul>
        </li>

    <?php
        
        }
    
    ?>
    </ul>
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>