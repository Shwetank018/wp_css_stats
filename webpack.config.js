// Requires
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

// Plugin Config
const extractCommons = new webpack.optimize.CommonsChunkPlugin({
  name: 'commons',
  filename: 'commons.js',
});
const extractCSS = new ExtractTextPlugin('[name].bundle.css');

const config = {
  node: {
    fs: 'empty',
  },
  devtool: 'source-map',
  context: path.resolve(__dirname, 'client/src'),
  entry: {
    admin: ['babel-polyfill', './js/admin.js'],
  },
  output: {
    path: path.resolve(__dirname, 'client/dist'),
    filename: '[name].bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        enforce: 'pre',
        use: [
          {
            loader: 'eslint-loader',
            options: {
              emitWarnings: true,
            },
          },
        ],
      },
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'client/src/js'),
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [['es2015', { modules: false }]],
            },
          },
        ],
      },
      {
        test: /\.scss$/,
        include: path.resolve(__dirname, 'client/src/scss'),
        use: extractCSS.extract([
          { loader: 'css-loader', options: { importLoaders: 2 } },
          'postcss-loader',
          'sass-loader',
        ]),
      },
      {
        test: /\.(jpg|png)$/,
        use: [
          {
            loader: 'url-loader',
            options: { limit: 10000 },
          },
        ],
      },
    ],
  },
  plugins: [new webpack.NamedModulesPlugin(), extractCommons, extractCSS],
};

module.exports = config;
