<div class="navbar">

				<ul class="nav navbar-nav">
                    <? foreach( $menu as $obj ) { ?>
                        
                            <li class="active"><a href="<?=$obj['url']?>"><?=$obj['label']?></a></li>
                            
                        
                        
                     <? } ?>
                     </ul>
</div>