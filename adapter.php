<?php

interface MediaPlayer {
    public function play($audioType, $filename);
}

interface AdvancedMediaPlayer {
    public function playVlc($filename);
    public function playMp4($filename);
}

/**
 * 创建实现了AdvancedMediaPlayer的具体类
 */
class VlcPlayer implements AdvancedMediaPlayer {
    function playVlc($filename)
    {
        echo "Vlc 正在播放$filename" . PHP_EOL;
    }

    function playMp4($filename)
    {
        // do nothing
    }
}

class Mp4Player implements AdvancedMediaPlayer {
    function playVlc($filename)
    {
        // do nothing
    }

    function playMp4($filename)
    {
        echo "mp4 正在播放$filename" . PHP_EOL;
    }
}

/**
 * 创建实现类MediaPlayer接口的适配器类
 */
class MediaAdapter implements MediaPlayer {
    private $advancedMusicPlayer;
    
    function __construct($audioType)
    {
        if (strtolower($audioType) === "vlc") {
            $this->advancedMusicPlayer = new VlcPlayer();
        }elseif (strtolower($audioType) === "mp4") {
            $this->advancedMusicPlayer = new Mp4Player();
        }else {
            // do nothing
        }
    }

    function play($audioType, $filename)
    {
        if (strtolower($audioType) === "vlc") {
            $this->advancedMusicPlayer->playVlc($filename);
        }elseif (strtolower($audioType) === "mp4") {
            $this->advancedMusicPlayer->playMp4($filename);
        }else {
            // do nothing
        }
    }
}

/**
 * 创建实现类MediaPlayer的AudioPlayer类
 */
class AudioPlayer implements MediaPlayer {
    private $mediaAdapter;

    function play($audioType, $filename)
    {
        if (strtolower($audioType) === "mp3") {
            echo "Playing mp3 file. Name: $filename" . PHP_EOL;
        }elseif (strtolower($audioType) === "mp4" || strtolower($audioType) === "vlc") {
            $this->mediaAdapter = new MediaAdapter($audioType);
            $this->mediaAdapter->play($audioType, $filename);
        }else {
            // do nothing
        }
    }
}


$player = new AudioPlayer();
$player->play("mp3", "ss.mp3");
$player->play('mp4', 'ss.mp4');
$player->play('vlc', "ss.vlc");