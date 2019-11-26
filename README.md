# BackHash

BackHash is an information security challenge in the Crypto category, and was presented to participants of [KAF CTF 2019](https://ctf.kipodafterfree.com)

## Challenge story

We found this thingy - we don't know what it does.

## Challenge exploit & solution

Bruteforce hashing until an input with a hash that contains `f1a9` is found.

## Challenge solution

```md
pseudo code:
charset = [a-zA-Z0-9]
function recursive(text = "", len = 3){
    if len == 0
        return;
    foreach char of charset{
        if hash(text+char).contains("f1a9"):
            print(text+char);
            return;
        else
            recursive(text+char, len - 1);
    }
}
```

```php
recursive("");

function recursive($in, $length = 3){
	if(strlen($in)<$length){
		foreach (str_split("abcdefghijklmnopqrstuvwxyz0123456789", 1) as $c){
			recursive($in . $c, $length);
		}
	}else{
		$hash = md5($in);
		echo $in . (strpos("f1a9", $hash) !== false) ? "\n" : "\r";
	}
}
```

## Building and installing

[Clone](https://github.com/NadavTasher/2019-BackHash/archive/master.zip) the repository, then type the following command to build the container:
```bash
docker build . -t backhash
```

To run the challenge, execute the following command:
```bash
docker run --rm -d -p 1070:80 backhash
```

## Usage

You may now access the challenge interface through your browser: `http://localhost:1070`

## Flag

Flag is:
```flagscript
KAF{Dn4k_f1a9z___much_f1a9_l0t5_h4ppy}
```

## License
[MIT License](https://choosealicense.com/licenses/mit/)