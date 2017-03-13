<?php

namespace SurrealCristian\SummaExercise;

use InvalidArgumentException;

class Developer extends Employee
{
    private $validLanguages = ['php', '.net', 'python'];
    private $languages = [];

    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function addLanguage(string $language): self
    {
        $language = strtolower($language);

        $this->assertLanguage($language);

        if (!in_array($language, $this->languages)) {
            $this->languages[] = $language;
        }

        return $this;
    }

    public function removeLanguage(string $language): self
    {
        $language = strtolower($language);

        $this->assertLanguage($language);

        $key = array_search($language, $this->languages);

        if ($key !== false) {
            unset($this->languages[$key]);
        }

        return $this;
    }

    private function assertLanguage($language)
    {
        if (!in_array($language, $this->validLanguages)) {
            throw new InvalidArgumentException('The language is invalid');
        }
    }
}
