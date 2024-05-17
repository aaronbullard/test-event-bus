{ pkgs }: {
  deps = [
    pkgs.vim
    pkgs.php81Extensions.xdebug
    pkgs.php81Packages.composer
    pkgs.php
  ];
}