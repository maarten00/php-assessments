<?php namespace Vevers\DijAssessments;

class Thesaurus
{
    protected $thesaurus;

    public function __construct(array $thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    /**
     * @param string $word
     * @return string
     */
    public function getSynonyms(string $word) : string{
        $synonyms = $this->thesaurus[$word] ?? [];

        $result = [
            'word' => $word,
            'synonyms' => $synonyms
        ];

        return json_encode($result);
    }

}