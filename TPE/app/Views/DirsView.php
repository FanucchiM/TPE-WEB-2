<?php

class DirsView {
    public function showDirs($dirs) {
        require './templates2/dirsList.phtml';
    }

    public function showAddDir() {
        require './templates2/addDir.phtml';
    }
}