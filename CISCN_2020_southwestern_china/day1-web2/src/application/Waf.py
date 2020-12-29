def waf_config(s):
        s = s.replace('(', '').replace(')', '')[:45]
        blacklist = ['config', 'self']
        return ''.join(['{{% set {}=None%}}'.format(c) for c in blacklist])+s