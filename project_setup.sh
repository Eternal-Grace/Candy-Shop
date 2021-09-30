#!/bin/bash

# STYLE
strong='\e[1m'

# COLOR
red='\e[0;91m'

# RESET
reset='\e[0m'

array=( "php" "composer" )
for extension in "${array[@]}"; do
    if ! type "${extension}" &> /dev/null; then
        echo -e "The command line: ${strong}${red}${extension}${reset} - DOES NOT EXISTS"
    fi
done
