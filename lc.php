<?php

/**
 * Haskell-like syntactic sugar for list comprehension involving elementary operations
 * @param  String $str          Syntactic sugar
 * @return Maybe Array          Returned PHP array
 */
function lc(String $str)
{
    $error = [];
    preg_match("/\[[a-z]\s\|\s[a-z]\s<-\s\[([0-9]+)..([0-9]+)\],?(.+)?\]/", $str, $matches);
    $r = range($matches[1], $matches[2]);
    $filter = isset($matches[3]) ? $matches[3] : null;
    if ($filter) {
        preg_match("/\w\s([\+|\-|>|<|=|%|\/]+)\s(\d+)/", $filter, $matches);
        $op = isset($matches[1]) ? $matches[1] : null;
        $filterCond = isset($matches[2]) ? (int) $matches[2] : null;

        if (!$op) {
            $error[] = "Operator empty";
        }

        if (!$filterCond) {
            $error[] = "Predicate condition not appropriate";
        }

        switch ($op) {
            case '<':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x <  (int) $filterCond;
                });
                break;
            case '==':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x == (int) $filterCond;
                });
                break;
            case '>':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x > (int) $filterCond;
                });
                break;
            case '%':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x % (int) $filterCond;
                });
                break;
            case '<=':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x <= (int) $filterCond;
                });
                break;
            case '>=':
                $r = array_filter($r, function ($x) use ($filterCond) {
                    return $x >= (int) $filterCond;
                });
                break;
            case '/':
                $r = array_map(function ($x) use ($filterCond) {
                    return $x / (int) $filterCond;
                }, $r);
                break;
            case '+':
                $r = array_map(function ($x) use ($filterCond) {
                    return $x + (int) $filterCond;
                }, $r);
                break;
            case '-':
                $r = array_map(function ($x) use ($filterCond) {
                    return $x - (int) $filterCond;
                }, $r);
                break;
            default:
                $error[] = "Operator not allowed";
                break;
        }
    }

    if ($error) {
        return $error;
    }

    // Reindex
    $retArr = [];
    foreach ($r as $value) {
        $retArr[] = $value;
    }
    return $retArr;
}
