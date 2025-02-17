function foo(a, b) {
  if (a === b) {
    return true; 
  }
  if (typeof a !== 'object' || typeof b !== 'object') {
    return false;
  }
  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false;
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key])) {
      return false;
    }
  }
  return true;
}

const obj1 = {a: 1, b: 2};
const obj2 = {a: 1, b: 2};
console.log(foo(obj1, obj2)); // true

const obj3 = {a: 1, b: {c: 3}};
const obj4 = {a: 1, b: {c: 3}};
console.log(foo(obj3, obj4)); // true

const obj5 = {a: 1, b: [1,2,3]};
const obj6 = {a: 1, b: [1,2,3]};
console.log(foo(obj5, obj6)); //false, this is the bug