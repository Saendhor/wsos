<?php

require_once "HtmlGenerator.php";

class HtmlPrinter extends HtmlGenerator
{
    // head: meta
    public function printMetaCharset($charset = "UTF-8")
    {
        $this->printTagVoid("meta", "charset='{$charset}'");
    }

    public function printMetaName($name, $content)
    {
        $this->printTagVoid("meta", "name='{$name}' content='{$content}'");
    }

    public function printMetaViewport($value = "width=device-width, initial-scale=1.0")
    {
        $this->printTagVoid("meta", "name='viewport' content='{$value}'");
    }

    // head: title
    public function printTitle($text)
    {
        $this->printTag("title", "", $text);
    }

    // head: style
    public function printStyle($css)
    {
        $this->printTag("style", "", $css);
    }

    // head: script (unificata)
    public function printScript($src = "", $js = "")
    {
        $src = trim($src);

        if ($src !== "")
        {
            // script esterno
            $this->printTag("script", "src='{$src}'", "");
        }
        else
        {
            // script inline
            $this->printTag("script", "", $js);
        }
    }

    // text tags
    public function printP($text, $attrs = "")
    {
        $this->printTag("p", $attrs, $text);
    }

    public function printH($level, $text, $attrs = "")
    {
        $level = (int)$level;

        if ($level < 1 || $level > 6)
        {
            $level = 1;
        }

        $this->printTag("h{$level}", $attrs, $text);
    }

    public function printSpan($text, $attrs = "")
    {
        $this->printTag("span", $attrs, $text);
    }

    // links
    public function printA($text, $href, $attrs = "")
    {
        $all = "href='{$href}' " . trim($attrs);
        $this->printTag("a", $all, $text);
    }

    // void tags
    public function printBr($attrs = "")
    {
        $this->printTagVoid("br", $attrs);
    }

    public function printHr($attrs = "")
    {
        $this->printTagVoid("hr", $attrs);
    }

    public function printImg($src, $attrs = "")
    {
        $all = "src='{$src}' " . trim($attrs);
        $this->printTagVoid("img", $all);
    }

    // lists
    public function printUlOpen($attrs = "")
    {
        $this->printTagOpen("ul", $attrs);
    }

    public function printUlClose()
    {
        $this->printTagClose("ul");
    }

    public function printLi($text, $attrs = "")
    {
        $this->printTag("li", $attrs, $text);
    }

    // tables
    public function printTableOpen($attrs = "")
    {
        $this->printTagOpen("table", $attrs);
    }

    public function printTableClose()
    {
        $this->printTagClose("table");
    }

    public function printTrOpen($attrs = "")
    {
        $this->printTagOpen("tr", $attrs);
    }

    public function printTrClose()
    {
        $this->printTagClose("tr");
    }

    public function printTd($text, $attrs = "")
    {
        $this->printTag("td", $attrs, $text);
    }
}

?>
