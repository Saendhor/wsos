<?php

require_once "HtmlGenerator.php";

class HtmlBuilder extends HtmlGenerator
{
    // meta tag
    public function addMetaCharset($charset = "UTF-8")
    {
        $this->addTagVoid("meta", "charset='{$charset}'");
    }

    public function addMetaName($name, $content)
    {
        $this->addTagVoid("meta", "name='{$name}' content='{$content}'");
    }

    public function addMetaViewport($value = "width=device-width, initial-scale=1.0")
    {
        $this->addTagVoid("meta", "name='viewport' content='{$value}'");
    }

    // title
    public function addTitle($text)
    {
        $this->addTag("title", "", $text);
    }

    // style
    public function addStyle($css)
    {
        $this->addTag("style", "", $css);
    }

    // script
    public function addScript($src = "", $js = "")
    {
        $src = trim($src);

        if ($src !== "")
        {
            // script esterno
            $this->addTag("script", "src='{$src}'", "");
        }
        else
        {
            // script interno
            $this->addTag("script", "", $js);
        }
    }


    // text tags
    public function addP($text, $attrs = "")
    {
        $this->addTag("p", $attrs, $text);
    }

    public function addH($level, $text, $attrs = "")
    {
        $level = (int)$level;

        if ($level < 1 || $level > 6)
        {
            $level = 1;
        }
        $this->addTag("h{$level}", $attrs, $text);
    }

    public function addSpan($text, $attrs = "")
    {
        $this->addTag("span", $attrs, $text);
    }

    // links
    public function addA($text, $href, $attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = "href='{$href}'" . ($attrs === "" ? "" : " $attrs");
        $this->addTag("a", $attrString, $text);
    }

    // void tags
    public function addBR($attrs = "")
    {
        $this->addTagVoid("br", $attrs);
    }

    public function addHR($attrs = "")
    {
        $this->addTagVoid("hr", $attrs);
    }

    public function addImg($src, $attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = "src='{$src}'" . ($attrs === "" ? "" : " $attrs");
        $this->addTagVoid("img", $attrString);
    }

    // lists
    public function addUlOpen($attrs = "")
    {
        $this->addTagOpen("ul", $attrs);
    }

    public function addUlClose()
    {
        $this->addTagClose("ul");
    }

    public function addLi($text, $attrs = "")
    {
        $this->addTag("li", $attrs, $text);
    }

    // tables
    public function addTableOpen($attrs = "")
    {
        $this->addTagOpen("table", $attrs);
    }

    public function addTableClose()
    {
        $this->addTagClose("table");
    }

    public function addTrOpen($attrs = "")
    {
        $this->addTagOpen("tr", $attrs);
    }

    public function addTrClose()
    {
        $this->addTagClose("tr");
    }

    public function addTd($text, $attrs = "")
    {
        $this->addTag("td", $attrs, $text);
    }
}

?>
