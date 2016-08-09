# coding: utf-8
lib = File.expand_path('../lib', __FILE__)
$LOAD_PATH.unshift(lib) unless $LOAD_PATH.include?(lib)
require 'slim2html/version'

Gem::Specification.new do |spec|
  spec.name          = "slim2html"
  spec.version       = Slim2html::VERSION
  spec.authors       = ["xioota"]
  spec.email         = ["xiootas@gmail.com"]

  spec.summary       = %q{Slim to HTML convertor}
  spec.description   = %q{Slim template convert to HTML recurtively.}
  spec.homepage      = "https://github.com/xioota/slim2html"
  spec.license       = "MIT"
  spec.add_dependency 'slim'

  spec.files         = `git ls-files -z`.split("\x0").reject { |f| f.match(%r{^(test|spec|features)/}) }
  spec.bindir        = "exe"
  spec.executables   = spec.files.grep(%r{^exe/}) { |f| File.basename(f) }
  spec.require_paths = ["lib"]

  spec.add_development_dependency "bundler", "~> 1.11"
  spec.add_development_dependency "rake", "~> 10.0"
  spec.add_development_dependency "rspec", "~> 3.0"
end
