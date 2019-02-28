<?php

namespace App\Service;

use App\Models\Feed;

class XmlService
{
    public static function parseXml($xmlStr, $includeLink = true)
    {
        $items = [];
        $xmlDoc = new \SimpleXMLElement($xmlStr);
        $posts = static::getItems($xmlDoc);

        foreach ($posts as $post) {
            $line['title'] = (string) $post->title;
            $line['publishDate'] = (string) $post->publishDate;
            $line['publishDate'] = !$line['publishDate'] ? (string) $post->pubDate : $line['publishDate'];

            if ($includeLink) {
                $line['link'] = (string) $post->link;
            }

            $items [] = $line;
        }

        return $items;
    }

    /*
     * use recursive to get items
     */
    public static function getItems($parents)
    {
        $parentArray = (array) $parents;
        if (isset($parentArray['item'])) {
            return $parentArray['item'];
        }

        $keys = array_keys($parentArray);
        foreach ($keys as $key) {
            if (!$parentArray[$key] instanceof \SimpleXMLElement) continue;
            return static::getItems($parentArray[$key]);
        }
    }
}
