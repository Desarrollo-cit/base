const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio' : './src/js/inicio.js',
    'js/armas/index' : './src/js/armas/index.js',
    'js/calibres/index' : './src/js/calibres/index.js',
    'js/delitos/index' : './src/js/delitos/index.js',
    'js/desastre_natural/index' : './src/js/desastre_natural/index.js',
    'js/fenomeno_natural/index' : './src/js/fenomeno_natural/index.js',
    'js/moneda/index' : './src/js/moneda/index.js',

  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/build')
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'styles.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sc|sa)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            'css-loader',
            'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        loader: 'file-loader',
        options: {
           name: 'img/[name].[hash:7].[ext]'
        }
      },
    ]
  }
};