<?php

function setValue($i, $j)
{
    $value = null;
    // $blackPiece = ['rook_black', 'knight_black', 'bishop_black', 'queen_black', 'king_black', 'bishop_black', 'knight_black', 'rook_black'];
    // $whitePiece = ['rook_white', 'knight_white', 'bishop_white', 'queen_white', 'king_white', 'bishop_white', 'knight_white', 'rook_white'];

    $blackPiece = ['rb', 'nb', 'bb', 'qb', 'kb', 'bb', 'nb', 'rb'];
    $whitePiece = ['rw', 'nw', 'bw', 'qw', 'kw', 'bw', 'nw', 'rw'];
    if ($i == 0) {
        $value = $blackPiece[$j];
    } else if ($i == 1) {
        $value = "pb";
    } else if ($i == 6) {
        $value = "pw";
    } else if ($i == 7) {
        $value = $whitePiece[$j];
    }
    return  $value;
}

function setBgcolor($i, $j)
{
    $dark = ['#006599', '#af6929', '#817716', '#769656', '#c1bfc0', '#a3524e'];
    $light = ['#9bcbff', '#ffd49e', '#ffd181', '#eeeed2', '#efefed', '#f2e8e7'];
    $colorOption = 0;

    $bgcolor = $dark[$colorOption];
    if (($i + $j) % 2 == 0) {
        $bgcolor = $light[$colorOption];
    }
    return $bgcolor;
}

function imgTag($img)
{
    // return "'images/$img.png'";
    // return '<img src="images/' . $img . '.png" alt="' . $img . '">';
}
