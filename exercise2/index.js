let natural = require('natural');
let WordCount = require('./wordCount');
var wordnet = new natural.WordNet();

let fs = require('fs');
// let file = fs.readFileSync('files/chinoiserie.txt', 'utf8');
// let file = fs.readFileSync('files/manners.txt', 'utf8');

let file = fs.readFileSync('files/bible.txt', 'utf8');
// let file = fs.readFileSync('files/test2.txt', 'utf8');
// console.log(file);

let tokenizer = new natural.WordTokenizer();
// let tokenizer = new natural.SentenceTokenizer();

let tokens = tokenizer.tokenize(file);
// console.log(tokens);

// console.log(natural.PorterStemmer.stem('light'));

var TfIdf = natural.TfIdf;
var tfidf = new TfIdf();
tfidf.addDocument(file);

// for (let j = 0; j < tokens.length; j++) {
//     tfidf.tfidfs(tokens[j], function (i, measure) {
//         console.log(i + tokens[j] + ":" + measure);
//         // console.log('document #' + i + ' is ' + measure);
//     });

// }

// tfidf.tfidfs('sisters', function (i, measure) {
//     console.log('document #' + i + ' is ' + measure);
// });

// tfidf.tfidfs('brothers', function (i, measure) {
//     console.log('document #' + i + ' is ' + measure);
// });






let wordCount = new WordCount();
wordCount.process(file);
wordCount.sortByCount();
wordCount.logTheDict();



var NGrams = natural.NGrams;
// console.log(NGrams.ngrams(file, 2));

let nGramsfound = NGrams.ngrams(file, 3);
let count = 0;

for (let i = 0; i < nGramsfound.length; i++) {
    if (nGramsfound[i][0] == 'she') {
        console.log(nGramsfound[i][1]);
    }
}

for (let i = 0; i < nGramsfound.length; i++) {
    if (nGramsfound[i][0] == 'she' && nGramsfound[i][1] == 'bare') {
        console.log(nGramsfound[i]);
    }
}


// console.log(natural.PorterStemmer.stem('words'));

// for (let i = 0; i < tokens.length; i++) {
//     wordnet.lookup(tokens[i], function (results) {
//         results.forEach(function (result) {
//             console.log('------------------------------------');
//             console.log(tokens[i] + ": ")
//             console.log(result.synsetOffset);
//             console.log(result.pos);
//             console.log(result.lemma);
//             console.log(result.synonyms);
//             console.log(result.pos);
//             console.log(result.gloss);
//         });
//     });
// }
// wordnet.lookup('tree', function (results) {
//     results.forEach(function (result) {
//         console.log('------------------------------------');
//         console.log(result.synsetOffset);
//         console.log(result.pos);
//         console.log(result.lemma);
//         console.log(result.synonyms);
//         console.log(result.pos);
//         console.log(result.gloss);
//     });
// });


// const language = "EN";
// const defaultCategory = 'N';
// const defaultCategoryCapitalized = 'NNP';


// var lexicon = new natural.Lexicon(language, defaultCategory, defaultCategoryCapitalized);
// var ruleSet = new natural.RuleSet('EN');
// var tagger = new natural.BrillPOSTagger(lexicon, ruleSet);

// console.log(tagger.tag(tokens));