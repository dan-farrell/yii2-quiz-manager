if (document.title === 'Index') {
  document.getElementById('body').className += 'index';
}

if (document.title === 'Login') {
  console.log('login');
  document.getElementById('body').style.backgroundColor = '#3f8cfb';
}
