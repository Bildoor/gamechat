/*global module */
module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        sass: {
            options: {
                sourceMap: true
            },
            dist: {
                files: { "incl/style.min.css": "assets/scss/style.scss" }
            }
        },
        uglify: {
            core: { files: { "incl/project.core.min.js": ["assets/scripts/core.js", "assets/scripts/*.js"] } },
            vendor: { files: { "incl/project.vendor.min.js": ["assets/scripts/vendor/jquery-1.12.4.min.js", "assets/scripts/vendor/*.js"] } }
        },
        watch: {
            assets: { files: ["assets/scss/**/*.scss"], tasks: ['sass'] },
            scripts: { files: ["assets/scripts/**/*.js"], tasks: ['uglify'] }
        }
    });

    grunt.registerTask("watch", ["watch"]);

    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-sass");
};
