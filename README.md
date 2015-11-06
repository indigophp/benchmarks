# Indigo Benchmarks

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

**Some PHP benchmarks to choose the best practice.**


## Usage

1. Clone the repository
2. Run `composer install`
3. Run `./vendor/bin/athletic -p ./benchmarks/`


### Some advices

You can modify the benchmark command to run some benchmarks you are really interested in instead of the whole suite. Insert the relevant path after `./benchmarks/`.

It is a general recommendation when it comes to benchmarking to use a clean environment which means:

- use as less extensions as possible
- disable any code profilers/debuggers (eg. xDebug)
- disable any runtime cache to get a valid result (eg. opcode)
- run benchmark in virtual environment if possible to prevent any effects from the OS and your usual environment


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/benchmarks/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
