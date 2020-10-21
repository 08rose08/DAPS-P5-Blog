<?php

abstract class Controller
{

    protected function checkForm($data)
    {
        
            //$data = stripslashes($data);
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = nl2br($data);

            //BBCode
            $data = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $data);
            $data = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $data);
            $data = preg_replace('#\[color=(red|green|blue|yellow|purple|orange)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $data);
            //$data = preg_replace('#\[list\](.+)\[/list\]#isU', '<ul>$1</ul>', $data);
            //$data = preg_replace('#\[\*\](.+)\[/\*\]#isU', '<li>$1</li>', $data);

            return $data;
        
    } 

    protected function toBB($data)
    {
        $data = preg_replace('#\<strong\>(.+)\</strong\>#isU', '[b]$1[/b]', $data);
        $data = preg_replace('#\<em\>(.+)\</em\>#isU', '[i]$1[/i]', $data);
        $data = preg_replace('#\<span style=\"color:(red|green|blue|yellow|purple|orange)\">(.+)\</span\>#isU', '[color=$1]$2[/color]', $data);
        //$data = preg_replace('#\<ul\>(.+)\</ul\>#isU', '[list]$1[/list]', $data);
        //$data = preg_replace('#\<li\>(.+)\</li\>"#isU', '[*]$1[/*]', $data);
        $data = preg_replace('#\<br /\>#isU', '', $data);
        
        return $data;
    }

    protected function switchBB($post)
    {
        $data = array(
            'id' => $post->id(),
            'id_author' => $post->id_author(),
            'username' => $post->username(),
            'title' => $this->toBB($post->title()),
            'content' => $this->toBB($post->content()),
            'last_update_date' => $post->last_update_date(),
            'chapo' => $this->toBB($post->chapo()),
            'picture' => $post->picture()
        );

        $postBB = new Post($data);
        return $postBB;
    }
}