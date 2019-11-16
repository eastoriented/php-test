# eastoriented/php-test [![Build Status](https://travis-ci.org/eastoriented/php-test.svg?branch=master)](https://travis-ci.org/eastoriented/php-test) [![Coverage Status](https://coveralls.io/repos/github/eastoriented/php-test/badge.svg?branch=master)](https://coveralls.io/github/eastoriented/php-test?branch=master)

`eastoriented/php-test` is a east oriented PHP library to do some test using object instead of `if` instruction.
All public methods in all classes return `void`.

## Contributing

### About workflow

We're using pull request to introduce new features and bug fixes.  
Please, try to be explicit in your commit messages:

1. Explain why the change was made ;
2. Explain technical implementation (you can provide links to any relevant tickets, articles or other resources).

You can use the following template:

```
# If applied, this commit will...

# Explain why this change is being made

# Provide links to any relevant tickets, articles or other resources
```

To use it, just put it in a text file in (for example) your home and define it as a template:

```
# git config --global commit.template ~/.git_commit_template.txt
```

### About testing

To run unit tests, just do `make tests/units`.

## Languages and tools

- [*atoum*](http://docs.atoum.org).
