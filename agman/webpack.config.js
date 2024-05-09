const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBar = require('webpackbar');

// https://webpack.js.org/guides/entry-advanced/#multiple-file-types-per-entry
module.exports = {
    // assets for work
    entry: {
        project: [
            './src/js/scripts.js',
            './src/scss/styles.scss'
        ],
    },
    // final assets
    output: {
        path: path.resolve(__dirname, 'assets'),
        filename: 'js/scripts.js',
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: '../style.css',
            chunkFilename: '../[id].css',
        }),
        new WebpackBar()
    ],
    module: {
        rules: [{
                test: /\.s[ac]ss$/i,
                use: [
                    // https://github.com/webpack-contrib/mini-css-extract-plugin#publicPath
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {}
                    },
                    // The css-loader interprets @import and url() like import/require() and will resolve them.
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true,
                        }
                    },
                    // Loads a Sass/SCSS file and compiles it to CSS.
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }
                ]
            },
            {
                test: /\.(png|jpg|jpeg|gif|svg)$/i,
                loader: 'file-loader',
                options: {
                    outputPath: 'images',
                    publicPath: '/wp-content/themes/agman/assets/images',
                    useRelativePaths: true
                }
            }
        ]
    }
};
