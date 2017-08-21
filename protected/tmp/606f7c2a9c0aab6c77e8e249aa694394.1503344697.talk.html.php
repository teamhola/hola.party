<?php if(!class_exists("View", false)) exit("no direct access allowed");?>
    <div class="outer">
        <section id="main">
            <?php $_foreach_r_counter = 0; $_foreach_r_total = count($records);?><?php foreach( $records as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?> 
            <article id="talk-<?php echo htmlspecialchars($r['id'], ENT_QUOTES, "UTF-8"); ?>" class="article article-type-talk" itemscope="" itemprop="blogPost">
                <div class="article-inner">
                    <header class="article-header">
                        <h1 class="article-title" itemprop="name">
                            <span class="catg-<?php echo htmlspecialchars($r['cid'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($catg[0]["title"], ENT_QUOTES, "UTF-8"); ?></span><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?>
                        </h1>
                    </header>
                    <div class="article-entry" itemprop="articleBody">
                        <div class="video-player" style="margin-top:2em">
                            <div videoplay="" id="videoplay-bilibili" class="active">
                                <?php if ($r['bilibili']) : ?>
                                <embed quality="high" allowfullscreen="" type="application/x-shockwave-flash" src="//static.hdslb.com/miniloader.swf" flashvars="aid=<?php echo htmlspecialchars($r['bilibili'], ENT_QUOTES, "UTF-8"); ?>&amp;page=1" pluginspage="//www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></div>
                                <?php endif; ?>
                                <?php if ($r['youtube']) : ?>
                                <div videoplay="" id="videoplay-youtube">
                                    <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($r['youtube'], ENT_QUOTES, "UTF-8"); ?>" frameborder="0" allowfullscreen="">
                                        &lt;p&gt;在某些网络环境下，您可能无法使用 YouTube 视频源。&lt;/p&gt;
                                    </iframe>
                                </div>
                                <?php endif; ?>
                        </div>
                        <div class="video-switcher">
                            <h5>视频源</h5>
                            <?php if ($r['bilibili']) : ?>
                            <a href="#bilibili" id="videosrc-bilibili" class="active">哔哩哔哩</a>
                            <?php endif; ?>
                            <?php if ($r['youtube']) : ?>
                            <a href="#youtube" id="videosrc-youtube" class="videosrc">YouTube</a>
                            <?php endif; ?>
                        </div>
                        <p>本视频录制于 <a href="https://ihola.one/events/<?php echo htmlspecialchars($events[0]["link"], ENT_QUOTES, "UTF-8"); ?>.html"><?php echo htmlspecialchars($events[0]["name"], ENT_QUOTES, "UTF-8"); ?></a>，讲者 <?php echo htmlspecialchars($users[0]["full_name"], ENT_QUOTES, "UTF-8"); ?>。</p>
                        <p><?php echo htmlspecialchars($r['desc'], ENT_QUOTES, "UTF-8"); ?></p>
                        <p>所有 <a href="https://ihola.one/events/<?php echo htmlspecialchars($events[0]["link"], ENT_QUOTES, "UTF-8"); ?>.html"><?php echo htmlspecialchars($events[0]["name"], ENT_QUOTES, "UTF-8"); ?></a> 活动视频均以 <a href="<?php echo htmlspecialchars($protocol[0]["link"], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($protocol[0]["name"], ENT_QUOTES, "UTF-8"); ?></a> 协议发布。请遵守协议，转载请注明出处，请勿用于商业用途。</p>
                    </div>
                    <footer class="article-footer">
                        <a data-url="https://ihola.one/talks/test.html" data-id="cj69gbfqk000cdm0uz3ye6lyf" class="article-share-link">Share</a>
                    </footer>
                </div>
            </article>
            <?php endforeach; ?>
            <script>
                if (!location.hash) location.hash = <?php if ($r['bilibili']) : ?>'#bilibili'<?php elseif ($r['youtube']) : ?>'#youtube'<?php endif; ?>

                window._prevId = location.hash.slice(1)
            
                const handler = e => {
                    !e || e.preventDefault()
                    document.getElementById('videosrc-' + window._prevId).setAttribute('class', '')
                    document.getElementById('videosrc-' + location.hash.slice(1)).setAttribute('class', 'active')
                    document.getElementById('videoplay-' + window._prevId).setAttribute('class', '')
                    document.getElementById('videoplay-' + location.hash.slice(1)).setAttribute('class', 'active')
                    window._prevId = location.hash.slice(1)
                    return false
                }
            
                window.addEventListener('hashchange', handler)
            
                handler()
            </script>
        </section>
        <aside id="sidebar">
            <div class="widget-wrap">
                <h3 class="widget-title">最新文章</h3>
                <div class="widget">
                    <ul>
                        <li>
                            <a href="https://ihola.one/2017/08/holaxluogu/">¡Hola! x 洛谷</a>
                        </li>
                        <li>
                            <a href="https://ihola.one/2017/08/conf17-souvenirs/">¡Hola! Conf 2017 纪念品发售</a>
                        </li>
                        <li>
                            <a href="https://ihola.one/2017/07/holaconf17-speaker/">¡Hola! Conf 2017 讲者</a>
                        </li>
                        <li>
                            <a href="https://ihola.one/2017/06/the-concept-video/">¡Hola! 概念宣传片发布</a>
                        </li>
                        <li>
                            <a href="https://ihola.one/2017/06/call-for-volunteer/">志愿者招募</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget-wrap">
                <h3 class="widget-title">合作伙伴 &amp; 赞助商</h3>
                <div class="widget">
                    <ul>
                        <li>
                            <a href="https://www.luogu.org?utm_source=ihola">
                                <img src="https://ihola.one/partners/luogu-31f15bf47677c2aec75b905bbe6836a3.png" alt="洛谷" class="hola-partner-logo">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
