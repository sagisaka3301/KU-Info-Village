<?php

namespace App\Lib;

class Common {
    public static function setUndergra($ungra) {

        if ($ungra === '1') {
            return '経営学部';
        } elseif ($ungra === '2') {
            return '経済学部';
        } elseif ($ungra === '3') {
            return '外国語学部';
        } elseif ($ungra === '4') {
            return '国際日本学部';
        } elseif ($ungra === '5') {
            return '法学部';
        } elseif ($ungra === '6') {
            return '人間科学部';
        } elseif ($ungra === '7') {
            return '理学部';
        } elseif ($ungra === '8') {
            return '工学部';
        } elseif ($ungra === '9') {
            return redirect()->route('kuinfo.classes');
        }
    }

    public static function setType($type) {
        if ($type === 1) {
            return '共';
        } elseif ($type === 2) {
            return '専';
        } elseif ($type === 3) {
            return '他';
        }
    }

    public static function setStar($star) {
        if ($star === 1) {
            return '★';
        } elseif($star === 2) {
            return '★★';
        } elseif($star === 3) {
            return '★★★';
        } elseif($star === 4) {
            return '★★★★';
        } elseif($star === 5) {
            return '★★★★★';
        } else {
            return '★';
        }
    }
}

?>
