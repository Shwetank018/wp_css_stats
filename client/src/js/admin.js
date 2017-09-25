/* global css_stats */
import Parker from 'parker/lib/Parker';
import metrics from 'parker/metrics/All';
import fetch from 'isomorphic-fetch';
import '../scss/admin.scss';

const parker = new Parker(metrics);
const dataTable = document.querySelector('.css-stats-output');
const refreshBtn = document.querySelector('.css-stats-header__refresh');
const refreshClass = 'css-stats-header__refresh--loading';

const createRow = (metric, data) => {
  const row = document.createElement('div');
  const metricEl = document.createElement('div');
  const dataEl = document.createElement('div');
  metricEl.innerHTML = metric;
  dataEl.innerHTML = data;
  row.classList.add('css-stats-output__row');
  row.setAttribute('data-stat', metric);
  row.appendChild(metricEl);
  row.appendChild(dataEl);
  return row;
};

const hasData = (rows, stat) => rows.some(row => row.dataset.stat === stat);
const buildTable = (table, data) => {
  Object.keys(data).forEach((stat) => {
    const tableRows = Array.from(document.getElementsByClassName('css-stats-output__row'));
    if (hasData(tableRows, stat)) {
      const updateRow = tableRows.find(row => row.dataset.stat === stat);
      updateRow.lastElementChild.innerHTML = data[stat];
    } else {
      const row = createRow(stat, data[stat]);
      table.appendChild(row);
    }
  });
  return data;
};

async function fetchCss() {
  const data = await Promise.all(
    css_stats.files.map(async (file) => {
      const fileUrl = file.substr(css_stats.path.length);
      const response = await fetch(css_stats.url + fileUrl);
      const cssData = await response.text();
      return cssData;
    }),
  );
  const stats = parker.run(data.join(' '));
  buildTable(dataTable, stats);
  return data;
}

fetchCss();
refreshBtn.addEventListener('click', () => {
  refreshBtn.classList.add(refreshClass);
  fetchCss();
  setTimeout(() => {
    refreshBtn.classList.remove(refreshClass);
  }, 1500);
});
