module.exports = ({ options, env }) => ({
  parser: 'postcss-scss',
  plugins: {
    autoprefixer: env === 'production' ? options.autoprefixer : false,
    cssnano: env === 'production' ? options.cssnano : false,
  },
});
