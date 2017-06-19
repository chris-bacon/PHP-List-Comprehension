# PHP List Comprehension

PHP array handling is, frankly, horrible; array_filter is cumbersome, and there is no list comprehension all together. This code is a proof of concept for list comprehension in PHP, written in PHP, for a number of elementary operations. The syntax is essentially, Haskell-like syntactic sugar, for PHP's iteration, array_filter, and creating new arrays. The code is hacky and horrible itself, and if done properly would include a parser, or some proper syntactic analysis. If I get time I'll rewrite it properly.

The syntax for the comprehension is as follows:

`[x | x <- [n..m], predicate]`

Which can be read as: _the set of all xs, such that x is drawn from the list ranging from n to m, and which satisfy the predicate_. The predicate is optional, allowing simple list creation.

`[x | x <- [n..m]]`

The current predicates/operations supported are equality, greater than, less than, division, addition, subtraction and modulo artithmetic.

## Usage

Simply include `lc.php` and then use the lc procedure.

## Examples

`lc("[x | x <- [1..5]]")`
> [1, 2, 3, 4, 5]

`lc("[x | x <- [10..20], x mod 2]")`
> [0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0]

`lc("[x | x <- [1..5], x == 1]")`
> [1]

`lc("[x | x <- [1..5], x <= 2]")`
> [1, 2]

`lc("[x | x <- [20..22], x + 1]")`
> [21, 22, 23]
