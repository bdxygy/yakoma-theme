const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { EsbuildPlugin } = require('esbuild-loader');

module.exports = {
    entry: './assets/js/index.js',
    mode: 'production',
    output: {
        filename: 'main.min.js',
        path: path.resolve(__dirname, 'dist'),
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'main.min.css',
        }),
    ],
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'esbuild-loader',
                options: {
                    target: 'es2015',
                },
            },
            {
                test: /\.css$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader'],
            },
        ],
    },
    optimization: {
        minimize: true,
        minimizer: [
            new EsbuildPlugin({
                target: 'es2015',
                css: true,
            }),
        ],
    },
};
