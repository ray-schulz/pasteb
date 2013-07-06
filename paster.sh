#!/bin/sh

# put this script somewhere like $HOME/bin or /usr/local/bin

# set this to your paste bucket
URL='http://paste.somewhere.com'

# if curl is in some odd place, set this accordinly
$CURL='curl'

# use it like this:
# $ cat bin/paster.sh | paster.sh 
#     http://paste.somewhere.com/1
$CURL -F 'paste=<-' $URL
