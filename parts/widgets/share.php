<?php

echo '
<p class="share">
    <a href="https://www.facebook.com/sharer/sharer.php?u='; the_permalink(); echo '" target="_blank">
        <i class="nm-font nm-font-facebook"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?text='; the_title(); echo '&url='; the_permalink(); echo '&hashtags='; bloginfo( 'title' ); echo '" target="_blank">
        <i class="nm-font nm-font-x-twitter"></i>
    </a>
    <a href="https://api.whatsapp.com/send?text='; the_permalink(); echo '" target="_blank">
        <i class="nm-font nm-font-whatsapp"></i>
    </a>
    <a href="tg://msg_url?url='; the_permalink(); echo '" target="_blank">
    <i class="nm-font nm-font-telegram"></i>
    </a>
</p>';