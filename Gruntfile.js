'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      // options: {
      //   jshintrc: '.jshintrc'
      // },
      all: [
        '!Gruntfile.js',
        '!assets/js/**/*.js',
        '!build/app.min.js'
      ]
    },
    sass: {
      dist: {
        options: {
          style: 'compressed',
          compass: false,
          sourcemap: false
        },
        files: {
          'build/app.min.css': [
              'assets/sass/app.scss'
          ]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'build/app.min.js': [
            'assets/js/vendor/*.js','assets/js/plugins/*.js','assets/js/**/*.js'
          ]
        },
        options: {
          sourceMap: 'build/app.min.js.map',
          sourceMappingURL: 'build/app.min.js.map'
        }
      }
    },
    watch: {
      options: {
        livereload: true
      },
      sass: {
        files: [
          'assets/sass/**/*.scss'
        ],
        tasks: ['sass']
      },
      js: {
        files: [
          'assets/js/vendor/*.js','assets/js/plugins/*.js','assets/js/**/*.js'
        ],
        tasks: ['uglify']
      },
      html: {
        files: [
          '**/*.html'
        ]
      }
    },
    clean: {
      dist: [
        'build/app.min.css',
        'build/app.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'sass',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};