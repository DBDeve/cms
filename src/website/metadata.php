<?php
     

    class metadata {

        public array $metadata;

        public string $lang;
        public string $charset;
        public string $viewport;
        public string $title;
        public string $description;
        public string $robots_index;
        public string $robots_follow;

        public function __construct(database $database) {

            $metadata=$database->getTableData("metadata");

            $this->lang = $metadata["lang"];
            $this->charset = $metadata["charset"];
            $this->viewport = $metadata["viewport"];
            $this->title = $metadata["titolo"];
            $this->description = $metadata["descrizione"];
            $this->robots_index = $metadata["robots_index"];
            $this->robots_follow = $metadata["robots_follow"];
            

        }

        public function getLang(){

            return $this->lang;

        }

        public function getHeadTags(){
            return "
                <meta charset='$this->charset'>
                <meta name='viewport' content='$this->viewport'>
                <title> $this->title </title>
                <meta name='description' content=' $this->description '>
                <meta name='robots' content='$this->robots_index, $this->robots_follow'>
            ";
        }


    }

?>