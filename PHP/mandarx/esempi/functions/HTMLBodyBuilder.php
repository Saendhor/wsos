<?php

// specializzazione di HTMLgenerator dedicata esclusivamente alla costruzione del body nella modalità 1

require_once "HtmlGenerator.php";

class HTMLBodyBuilder extends HTMLgenerator
{
    // paragraph
    public function addPToBody($text, $attrs = "")
    {
        $this->addTagToBody("p", $attrs, $text);
    }

    // headers
    public function addHToBody($level, $text, $attrs = "")
    {
        $level = (int)$level;

        if ($level < 1 || $level > 6)
        {
            $level = 1;
        }    
        $this->addTagToBody("h{$level}", $attrs, $text);
    }

    // inline text
    public function addSpanToBody($text, $attrs = "")
    {
        $this->addTagToBody("span", $attrs, $text);
    }

    // link
    public function addAToBody($text, $href, $attrs = "")
    {
        $attr = "href='{$href}' " . trim($attrs);
        $this->addTagToBody("a", $attr, $text);
    }

    // image
    public function addImgToBody($src, $attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addTagToBody("img", "src='{$src}'{$attrString}", "");
    }

    // hr
    public function addHRToBody($attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addTagToBody("hr", "{$attrString}", "");
    }

    // br
    public function addBRToBody($attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addTagToBody("br", "{$attrString}", "");
    }

    // list open/close
    public function addUlOpenToBody($attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addToBody("<ul{$attrString}>");
    }
    public function addUlCloseToBody()
    {
        $this->addToBody("</ul>");
    }

    public function addLiToBody($text, $attrs = "")
    {
        $this->addTagToBody("li", $attrs, $text);
    }

    // table
    public function addTableOpenToBody($attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addToBody("<table{$attrString}>");
    }
    public function addTableCloseToBody()
    {
        $this->addToBody("</table>");
    }

    public function addTrOpenToBody($attrs = "")
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;
        $this->addToBody("<tr{$attrString}>");
    }
    public function addTrCloseToBody()
    {
      $this->addToBody("</tr>");
    }
    public function addTdToBody($text, $attrs = "")
    {
        $this->addTagToBody("td", $attrs, $text);
    }
}

?>
