require "slim2html/version"
require "fileutils"

module Slim2html
  def self.convert!(input)
    @dir = input
    @dir = @dir.gsub(/\/\z/,  '')
    if @dir == "." then
      @dir = `pwd`
    end

    @newDir = @dir + "_html"
    FileUtils.rm_rf(@newDir) if FileTest.exist?(@newDir)
    FileUtils.cp_r(@dir, @newDir)

    Dir.glob(@newDir + "/**/*.slim") do |slim|
      @html = slim.gsub(/\.slim\z/, '.html')
      `slimrb -p #{slim} > #{@html}`
      File.delete slim
      puts "Made #{@html}"
    end
  end
end
