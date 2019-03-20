/* global process __dirname */
const DEV = process.env.NODE_ENV !== 'production';

const path = require('path');
const themeName = 'infinum';

const fontsPath = path.join(__dirname, 'skin/assets/fonts');
const publicFontsPath = `/wp-content/themes/${themeName}/skin/public`;

const autoPrefixer = require('autoprefixer');
const cssMqpacker = require('css-mqpacker');
const postcssFontMagician = require('postcss-font-magician');
const cssNano = require('cssnano');

const plugins = [
  autoPrefixer,
  postcssFontMagician({
    custom: {
      MuseoSansRounded: {
        variants: {
          normal: {
            100: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-100.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-100.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-100.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-100.woff`,
              },
            },
            300: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-300.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-300.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-300.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-300.woff`,
              },
            },
            500: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-500.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-500.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-500.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-500.woff`,
              },
            },
            700: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-700.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-700.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-700.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-700.woff`,
              },
            },
            900: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-900.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-900.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-900.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-900.woff`,
              },
            },
            1000: {
              url: {
                eot: `${publicFontsPath}/MuseoSansRounded-1000.eot`,
                svg: `${publicFontsPath}/MuseoSansRounded-1000.svg`,
                ttf: `${publicFontsPath}/MuseoSansRounded-1000.ttf`,
                woff: `${publicFontsPath}/MuseoSansRounded-1000.woff`,
              },
            },
          },
        },
      },
      icomoon: {
        variants: {
          normal: {
            400: {
              url: {
                eot: `${publicFontsPath}/icomoon.eot`,
                svg: `${publicFontsPath}/icomoon.svg`,
                ttf: `${publicFontsPath}/icomoon.ttf`,
                woff: `${publicFontsPath}/icomoon.woff`,
              },
            },
          },
        },
      },
    },
    hosted: [fontsPath, publicFontsPath],
    foundries: ['hosted', 'custom'],
  }),
  cssMqpacker,
];

// Use only for production build
if (!DEV) {
  plugins.push(cssNano);
}

module.exports = {plugins};
