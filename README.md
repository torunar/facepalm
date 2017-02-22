# facepalm.php

>I've serialized data on a 64-bit server.
>Now I can't use it on my 32-bit machine!

`//_-`

## About

This script parses a file and replaces serialized integers with strings: `i:100500` -> `s:6:"100500"`

Let duck typing do its job and hope for the best.

But first ask yourself a question: was usage of `serialize` all that necessary?

## How to

    $ php facepalm.phph huge-enterprise-db.sql
