<?php

/*
MODALITÀ SUPPORTATE DALLA CLASSE HtmlGenerator
==============================================

1) MODALITÀ "HTML COMPLETO"
   Metodi per preparare il documento:
     - setHTMLAttrs($attrs) attributi del tag <html>
     - createHTML() genera <!DOCTYPE html> + <html>

   Metodi per costruire l'head:
     - setTitle($text)
     - addMeta($attrs)
     - addStyle($css)
     - addStyleLink($href)
     - addScript($js)
     - addScriptSrc($src)
     - setBase($attrs)

   Metodi per il body:
     - setBodyAttrs($attrs)
     - createBody()
     - addToBody($rawHtml)
     - addTagToBody($tag, $attrs, $text, $wrapper)

   Output finale:
     - getHtml() restituisce HTML completo


2) MODALITÀ "BUILDER MANUALE" (costruzione di HTML generico in stringa)
   Aggiunge contenuti a $htmlGeneric:
     - addDoctype()
     - addTag($tag, $attrs, $text)
     - addTagVoid($tag, $attrs)
     - addTagOpen($tag, $attrs)
     - addTagClose($tag)
     - addText($text)

   Output finale:
     - getHtmlGeneric() restituisce la stringa HTML composta


3) MODALITÀ "IMMEDIATA" (streaming tramite echo)
   Stampa direttamente senza accumulare:
     - printDoctype()
     - printTag($tag, $attrs, $text)
     - printTagVoid($tag, $attrs)
     - printTagOpen($tag, $attrs)
     - printTagClose($tag)
     - printText($text)
     - printCloseOpenTags($amount = null)
*/


Class HtmlGenerator
{
    private $htmlStart = "";
        private $htmlAttrs = "";

    private $voidTags = ['img','br','hr','input','meta','link','source','area','base','col','embed','param','track','wbr'];


    private $head = "";
        private $title = "";
        private $meta = [];
        private $styles = [];
        private $links = [];
        private $scripts = [];
        private $base = "";

    private $bodyStart = "";
        private $bodyAttr = "";
    private $bodyEnd = "";

    private $htmlEnd = "";

    private $htmlGeneric = "";
    
    private $stackGeneric = [];
    private $stackPrint = [];

    // ===============================================================
    //   SEZIONE 1 (COSTRUIRE L’HTML COMPLETO IN MODALITA' AUTOMATICA)
    // ===============================================================

    public function setHTMLAttrs($attrs)
    {
        $this->htmlAttrs = trim($attrs);
    }
    public function createHTML()
    {
        $attrString = $this->htmlAttrs === "" ? "" : " " . $this->htmlAttrs;
        $this->htmlStart = "<!DOCTYPE html>\n<html{$attrString}>\n";
        $this->htmlEnd = "</html>";
    }
    
    public function setBodyAttrs($attrs)
    {
        $this->bodyAttr = trim($attrs);
    }
    public function addToBody($rawHtml)
    {
        $this->bodyStart .= $rawHtml . "\n";
    }
    public function addTagToBody($tag, $attrs, $text, $wrapper = false)
    {
        $tag = strtolower(trim($tag));
        $text = trim($text);
        $attrs = trim($attrs);
        $isVoid = in_array($tag, $this->voidTags);

        $attrString = $attrs === "" ? "" : " " . $attrs;

        if ($isVoid)
        {
            $this->bodyStart .= "<{$tag}{$attrString}>\n";
        }
        else
        {
            $this->bodyStart .= "<{$tag}{$attrString}>\n$text";
            if($wrapper)
            {
                if($text!="")
                    $this->bodyStart .= "\n";

                $this->bodyEnd = "</{$tag}>\n" . $this->bodyEnd;
            } 
            else
                $this->bodyStart .= "</{$tag}>\n";
        }
    }
    

    public function createBody()
    {
        $attrString = $this->bodyAttr === "" ? "" : " " . $this->bodyAttr;

        $this->bodyStart = "<body{$attrString}>\n";
        $this->bodyEnd = "</body>\n";
    }
    

    public function setTitle($text)
    {
        $this->title = $text;
    }

    public function addMeta($attrs)
    {
        $this->meta[] = "<meta " . trim($attrs) . ">\n";
    }

    public function addStyle($css)
    {
        $this->styles[] = "<style>{$css}</style>\n";
    }

    public function addStyleLink($href)
    {        
        $this->links[] = "<link rel='stylesheet' href='{$href}'>\n";
    }

    public function addScript($js)
    {
        $this->scripts[] = "<script>{$js}</script>\n";
    }

    public function addScriptSrc($src)
    {
        $this->scripts[] = "<script src='{$src}'></script>\n";
    }

    public function setBase($attrs)
    {
        $this->base = "<base " . trim($attrs) . ">\n";
    }

    private function buildHead()
    {
        $this->head = "<head>\n";

        if ($this->title !== "")
            $this->head .= "<title>{$this->title}</title>\n";

        if ($this->base !== "")
            $this->head .= $this->base . "\n";

        $this->head .= implode("", $this->meta);
        $this->head .= implode("", $this->links);
        $this->head .= implode("", $this->styles);
        $this->head .= implode("", $this->scripts);

        $this->head .= "</head>\n";
    }

    public function getHtml()
    {
        $this->buildHead();
        return $this->htmlStart .  $this->head . $this->bodyStart . $this->bodyEnd . $this->htmlEnd;
    }




    // ======================================================================
    //   SEZIONE 2 (BUILDER MANUALE: COSTRUZIONE DI HTML GENERICO IN STRINGA)
    // ======================================================================
    private function buildTag($tag, $attrs, $text)
    {   
        return $this->openTag($tag, $attrs) . $text . $this->closeTag($tag);
    }
    private function openTag($tag, $attrs)
    {   
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;

        return "<{$tag}{$attrString}>\n";
    }
    private function closeTag($tag)
    {   
        return "</{$tag}>\n";
    }

    public function addDoctype()
    {
        $this->htmlGeneric = "<!DOCTYPE html>\n";
    }
    public function addTag($tag, $attrs, $text)
    {   
        $this->htmlGeneric .= $this->buildTag($tag, $attrs, $text) . "\n";
    }
    public function addTagVoid($tag, $attrs)
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;

        $this->htmlGeneric .= "<{$tag}{$attrString}>\n";
    }

    public function addTagOpen($tag, $attrs)
    {     
        $this->htmlGeneric .= $this->openTag($tag, $attrs) . "\n";
        if (strtolower($tag) !== "html")
            $this->stackGeneric[] = $tag;
    }

    public function addTagClose($tag)
    {   
        if (!empty($this->stackGeneric))
        {
            $last = end($this->stackGeneric);

            if ($last === $tag)
            {
                array_pop($this->stackGeneric);
            }
        }
    
        $this->htmlGeneric .= $this->closeTag($tag) . "\n";
    }

    public function closeOpenTags($amount = null)
    {
        // se $amount è nullo li chiude tutti
        if ($amount === null)
        {
            while (!empty($this->stackGeneric))
            {
                $tag = array_pop($this->stackGeneric);
                $this->htmlGeneric .= "</{$tag}>\n";
            }
            return;
        }

        // altrimenti chiude solo la quantita specificata
        $amount = (int)$amount;

        while ($amount > 0 && !empty($this->stackGeneric))
        {
            $tag = array_pop($this->stackGeneric);
            $this->htmlGeneric .= "</{$tag}>\n";
            $amount--;
        }

        // NOTA: i due casi si possono unire ma per chiarezza sono separati
    }

    
    public function addText($text)
    {
        $this->htmlGeneric .= $text . "\n";
    }

    public function getHtmlGeneric()
    {
        return $this->htmlGeneric;
    }


    // ======================================================
    // SEZIONE 3 (MODALITÀ IMMEDIATA: STREAMING TRAMITE ECHO)
    // ======================================================

    public function printDoctype()
    {
        echo "<!DOCTYPE html>\n";
    }
    public function printTag($tag, $attrs, $text)
    {   
        echo $this->buildTag($tag, $attrs, $text) . "\n";
    }
    public function printTagVoid($tag, $attrs)
    {
        $attrs = trim($attrs);
        $attrString = $attrs === "" ? "" : " " . $attrs;

        echo "<{$tag}{$attrString}>\n";
    }

    public function printTagOpen($tag, $attrs)
    {   
        echo $this->openTag($tag, $attrs) . "\n";
        if (strtolower($tag) !== "html")
            $this->stackPrint[] = $tag;
    }

    public function printTagClose($tag)
    {   
        if (!empty($this->stackPrint))
        {
            $last = end($this->stackPrint);

            if ($last === $tag)
            {
                array_pop($this->stackPrint);
            }
        }
        echo $this->closeTag($tag) . "\n";
    }

    public function printCloseOpenTags($amount = null)
    {
        // Se $amount è nullo chiude tutto
        if ($amount === null)
        {
            while (!empty($this->stackPrint))
            {
                $tag = array_pop($this->stackPrint);
                echo "</{$tag}>\n";
            }
            return;
        }

        // Altrimenti chiude solo la quantita specificata
        $amount = (int)$amount;

        while ($amount > 0 && !empty($this->stackPrint))
        {
            $tag = array_pop($this->stackPrint);
            echo "</{$tag}>\n";
            $amount--;
        }
        
        // NOTA: i due casi si possono unire ma per chiarezza sono separati
    }

    public function printText($text)
    {
        echo $text . "\n";
    }
}

?>