/*global module */
module.exports = function (grunt) {
    'use strict';

    grunt.initConfig({
        sass: {
            options: {
                sourceMap: true
            },
            dist: {
                files: { "style.css": "scss/style.scss" }
            }
        },
        uglify: {
            core: { files: { "project.core.min.js": ["scripts/core.js", "scripts/*.js"] } },
            vendor: { files: { "project.vendor.min.js": ["scripts/vendor/jquery-1.12.4.min.js", "scripts/vendor/*.js"] } }
        },
        watch: {
            assets: { files: ["scss/**/*.scss"], tasks: ['sass'] },
            scripts: { files: ["scripts/**/*.js"], tasks: ['uglify'] }
        }
    });

    grunt.registerTask("watch", ["watch"]);

    grunt.loadNpmTasks("grunt-contrib-watch");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-sass");
};
