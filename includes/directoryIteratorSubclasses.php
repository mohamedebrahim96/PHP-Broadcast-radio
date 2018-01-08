<?php

class VisibleOnlyFilter extends RecursiveFilterIterator
{
    public function accept()
    {
        $fileName = $this->getInnerIterator()->current()->getFileName();
        $firstChar = $fileName[0];

        return $firstChar !== '.';
    }
}

class FilesOnlyFilter extends RecursiveFilterIterator
{
    public function accept()
    {
        $iterator = $this->getInnerIterator();

        // allow traversal
        if ($iterator->hasChildren()) {
            return true;
        }

        // filter entries, only allow true files
        return $iterator->current()->isFile();
    }
}
