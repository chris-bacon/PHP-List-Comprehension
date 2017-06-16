# PHP List Comprehension

PHP array handling is, frankly, horrible; array_filter is cumbersome, and there is no list comprehension all together. This code is a proof of concept for list comprehension in PHP, written in PHP, for a number of elementary operations. The syntax is essentially, Haskell-like syntactic sugar, for PHP's iteration, array_filter, and creating new arrays. The code is hacky and horrible itself, and if done properly would include a parser, or some proper syntactic analysis. If I get time I'll rewrite it properly.

The syntax for the comprehension is as follows:

`[x | x <- [n..m], predicate]`

Which can be read as: _the set/list of all xs, such that x is drawn from the list ranging from n to m, and which satisfy the predicate_. The predicate is optional.

## Examples

`lc("[x | x <- [1..5]]")`
> [1, 2, 3, 4, 5]

`lc("[x | x <- [10..20]]")`
> [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]

`lc("[x | x <- [1..5], x == 1]")`
> [1]

`lc("[x | x <- [1..5], x <= 2]")`
> [1, 2]
